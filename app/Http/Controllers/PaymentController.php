<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Exceptions\PaymentFailure;
use Exception;


class PaymentController extends Controller
{
    public function show()
    {
        $user = Auth::user();                   // Pobranie zalogowanego użytkownika

        // Sprawdzanie, czy dane nie są w sesji
        if (!session()->has('destination') || !session()->has('start_date') || !session()->has('end_date') ||
            !session()->has('price') || !session()->has('participants') || !session()->has('total_cost') ||
            !session()->has('total_prepayment')) {

            $date = $user->dates->first();                  //Pobranie pierwszej powiązanej daty użytkownika.  Zakładam, że użytkownik ma tylko jedną datę powiązaną z wycieczką
            $trip = $date->trip;                            // Pobranie powiązanej wyprawy poprzez model `Date`
            $participants = $user->participants;  // Pobranie liczby uczestników
            $price = $date->price;                          // Pobranie ceny

            // Obliczenia
            $prepayment = floor(0.30 * $price / 10) * 10;
            $total_prepayment = $prepayment * $participants;
            $total_cost = $price * $participants;

            // Formatowanie liczb z separatorem tysięcy i bez miejsc po przecinku
            $formatted_price = number_format($price, 0, ',', ' ');
            $formatted__prepayment = number_format($prepayment, 0, ',', ' ');
            $formatted_total_prepayment = number_format($total_prepayment, 0, ',', ' ');
            $formatted_total_cost = number_format($total_cost, 0, ',', ' ');

            // Funkcja do wyboru odpowiedniego słowa
            $participants_label = $this->getParticipantsLabel($participants);

            // Formatowanie dat
            $start_date = \Carbon\Carbon::parse($date->start_date)->translatedFormat('l, j F Y');
            $end_date = \Carbon\Carbon::parse($date->end_date)->translatedFormat('l, j F Y');

            // Zapis danych do sesji
            session([
                'destination' => $trip->destination,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'formatted_price' => $formatted_price,
                'participants' => $participants,
                'participants_label' => $participants_label,
                'total_prepayment' => $total_prepayment,
                'total_cost' => $total_cost,
                'formatted_prepayment' => $formatted__prepayment,
                'formatted_total_prepayment' => $formatted_total_prepayment,
                'formatted_total_cost' => $formatted_total_cost
            ]);
        }

        // Pobieranie danych z sesji do widoku
        $data = [
            'destination' => session('destination'),
            'start_date' => session('start_date'),
            'end_date' => session('end_date'),
            'price' => session('price'),
            'participants' => session('participants'),
            'participants_label' => session('participants_label'),
            'formatted_total_prepayment' => session('formatted_total_prepayment'),
            'formatted_total_cost' => session('formatted_total_cost')
        ];

        // Logika wyboru zdjęć na podstawie destynacji
        $images = [
            'Argentyna i Chile' => 'arg3.jpg',
            'Indonezja' => 'indo8.jpg',
            'Kambodża' => 'camb4.jpg',
            'Peru i Boliwia' => 'peru8.jpg',
            'Sri Lanka' => 'sri4.jpg',
            'Tybet, w Chinach' => 'tibet2.jpg'
        ];

        $destination = session('destination'); // Pobranie destynacji z sesji
        $image = isset($images[$destination]) ? $images[$destination] : 'default.jpg';
        $smallImage = 'sm-' . $image;

        // Dodanie ścieżek obrazów do danych przekazywanych do widoku
        $data = [
            'destination' => session('destination'),
            'start_date' => session('start_date'),
            'end_date' => session('end_date'),
            'price' => session('price'),
            'participants' => session('participants'),
            'participants_label' => session('participants_label'),
            'formatted_total_prepayment' => session('formatted_total_prepayment'),
            'formatted_total_cost' => session('formatted_total_cost'),
            'image' => $image,  // Dodanie zmiennej z nazwą obrazu
            'smallImage' => $smallImage // Dodanie zmiennej z nazwą małego obrazu
        ];

        // Przekazanie danych do widoku
        $client = $user->clients->first(); // Pobranie pierwszego powiązanego klienta
        $date = $user->dates->first(); // Pobranie pierwszej powiązanej daty użytkownika

        return view('service.payment', array_merge($data, [
            'client' => $client,
            'date' => $date,
        ]));

        // return view('service.payment', $data);
    }

    private function getParticipantsLabel($count)
    {
        if ($count == 1) {
            return 'osoba';
        } elseif (in_array($count, [2, 3, 4])) {
            return 'osoby';
        } else {
            return 'osób';
        }
    }

    public function checkout(Request $request)
    {
        $user = $request->user();

        $paymentOption = $request->input('payment');                // Pobranie wyboru użytkownika z formularza
        $leaderId = $user->clients->first()->leader_id;				// Pobranie `leader_id` głównego użytkownika

        // Odczytanie kwoty z sesji na podstawie wyboru użytkownika
        if ($paymentOption === 'zaliczka') {
            $amount = intval(session('total_prepayment') * 100);                        // Konwersja na grosze
            // $user->clients->first()->update(['stage' => 'przedpłacone']);    // Aktualizacja stage na przedpłacone
            Client::where('leader_id', $leaderId)->update(['stage' => 'przedpłacone']); // Aktualizacja stage na przedpłacone
        } elseif ($paymentOption === 'calosc') {
            $amount = intval(session('total_cost') * 100);                              // Konwersja na grosze
            // $user->clients->first()->update(['stage' => 'opłacone']);       // Aktualizacja stage na opłacone
            Client::where('leader_id', $leaderId)->update(['stage' => 'opłacone']);     // Aktualizacja stage na opłacone
        } else {
            return redirect()->route('service.payment')->with('error', 'Nie wybrano prawidłowej opcji płatności.');
        }

        try {
            // Utworzenie sesji Stripe Checkout z dynamiczną kwotą
            return $user->checkoutCharge($amount, 'Opłata za wyprawę', 1, [
                'success_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ]);
        } catch (Exception $e) {
            return redirect()->route('service.payment')->with('error', 'Coś poszło nie tak podczas przetwarzania płatności. Spróbuj ponownie.');
        }
    }

    public function paymentSuccess()
    {
        $user = Auth::user();               // Pobranie zalogowanego użytkownika

        $clients = $user->clients;          // Pobranie kolekcji klientów powiązanych z użytkownikiem
        $firstClient = $clients->first();   // Pobranie pierwszego klienta z kolekcji
        if ($firstClient) {
            $stage = $firstClient->stage;  // Uzyskanie wartości pola 'stage' pierwszego klienta
        } else {
            return redirect()->route('service.payment')->with('error', 'Nie znaleziono klienta dla tego użytkownika.');           // Obsługa sytuacji, gdy nie ma klientów
        }

        if ($stage === 'przedpłacone') {
            return redirect()->route('service.payment2')->with('alert', 'Zaliczka zatwierdzona. Pozostaje dopłacić do pełnej ceny i ruszamy w świat!');
        } elseif ($stage === 'opłacone') {
            return redirect()->route('service.final');
        } else {
            return redirect()->route('service.payment')->with('error', 'Nieprawidłowy etap płatności.');
        }
    }

    public function paymentCancel()
    {
        return redirect()->route('home')->with('alert', 'Płatność odrzucona. Spróbuj ponownie.');
    }

    public function paymentFailed()
    {
        return redirect()->route('home')->with('alert', 'Płatność odrzucona. Spróbuj ponownie.');
    }
}
