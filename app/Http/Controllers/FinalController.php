<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalController extends Controller
{
    public function show()
    {
        $user = Auth::user();                   // Pobranie zalogowanego użytkownika

        // Sprawdzanie, czy dane nie są w sesji
        if (!session()->has('destination') || !session()->has('start_date') || !session()->has('end_date') ||
            !session()->has('price') || !session()->has('participants') || !session()->has('total_cost') ||
            !session()->has('total_prepayment') || !session()->has('formatted_balance')) {

            $date = $user->dates->first();                  //Pobranie pierwszej powiązanej daty użytkownika.  Zakładam, że użytkownik ma tylko jedną datę powiązaną z wycieczką
            $trip = $date->trip;                            // Pobranie powiązanej wyprawy poprzez model `Date`
            $participants = $user->participants;  // Pobranie liczby uczestników
            $price = $date->price;                          // Pobranie ceny

            // Obliczenia
            $prepayment = floor(0.30 * $price / 10) * 10;
            $total_prepayment = $prepayment * $participants;
            $total_cost = $price * $participants;
            $balance = $total_cost - $total_prepayment;

            // Formatowanie liczb z separatorem tysięcy i bez miejsc po przecinku
            $formatted_price = number_format($price, 0, ',', ' ');
            $formatted__prepayment = number_format($prepayment, 0, ',', ' ');
            $formatted_total_prepayment = number_format($total_prepayment, 0, ',', ' ');
            $formatted_total_cost = number_format($total_cost, 0, ',', ' ');
            $formatted_balance = number_format($balance, 0, ',', ' ');

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
                'balance' => $balance,

                'formatted_prepayment' => $formatted__prepayment,
                'formatted_total_prepayment' => $formatted_total_prepayment,
                'formatted_total_cost' => $formatted_total_cost,
                'formatted_balance' => $formatted_balance
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
            'formatted_total_cost' => session('formatted_total_cost'),
            'formatted_balance' => session('formatted_balance')
        ];

        // Logika wyboru zdjęć na podstawie destynacji
        $images = [
            'Argentyna i Chile' => 'arg1.jpg',
            'Indonezja' => 'indo3.jpg',
            'Kambodża' => 'camb1.jpg',
            'Peru i Boliwia' => 'peru1.jpg',
            'Sri Lanka' => 'sri6.jpg',
            'Tybet, w Chinach' => 'tibet1.jpg'
        ];

        $destination = session('destination');          // Pobranie destynacji z sesji
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
            'image' => $image,                          // Dodanie zmiennej z nazwą obrazu
            'smallImage' => $smallImage                 // Dodanie zmiennej z nazwą małego obrazu
        ];

        return view('service.final', $data);        // Przekazanie danych do widoku
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
}
