<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show()
    {
        $user = Auth::user();                   // Pobranie zalogowanego użytkownika

        // Sprawdzanie, czy dane nie są w sesji
        if (!session()->has('destination') || !session()->has('start_date') || !session()->has('end_date') ||
            !session()->has('price') || !session()->has('participant_count') || !session()->has('total_cost') ||
            !session()->has('total_prepayment')) {

            $date = $user->dates->first(); 		                //Pobranie pierwszej powiązanej daty użytkownika.  Zakładam, że użytkownik ma tylko jedną datę powiązaną z wycieczką
            $trip = $date->trip;                                // Pobranie powiązanej wycieczki poprzez model `Date`
            $participant_count = $user->participant_count;      // Pobranie liczby uczestników
            $price = $date->price;                              // Pobranie ceny

            // Obliczenia
            $prepayment = floor(0.30 * $price / 10) * 10;
            $total_prepayment = $prepayment * $participant_count;
            $total_cost = $price * $participant_count;

            // Formatowanie liczb z separatorem tysięcy i bez miejsc po przecinku
            $formatted_price = number_format($price, 0, ',', ' ');
            $formatted__prepayment = number_format($prepayment, 0, ',', ' ');
            $formatted_total_prepayment = number_format($total_prepayment, 0, ',', ' ');
            $formatted_total_cost = number_format($total_cost, 0, ',', ' ');

            // Funkcja do wyboru odpowiedniego słowa
            $participants_label = $this->getParticipantsLabel($participant_count);

            // Formatowanie dat
            $start_date = \Carbon\Carbon::parse($date->start_date)->translatedFormat('l, j F Y');
            $end_date = \Carbon\Carbon::parse($date->end_date)->translatedFormat('l, j F Y');

            // Zapis danych do sesji
            session([
                'destination' => $trip->destination,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'formatted_price' => $formatted_price,
                'participant_count' => $participant_count,
                'participants_label' => $participants_label,
                'formatted_prepayment' => $formatted__prepayment,
                'formatted_total_prepayment' => $formatted_total_prepayment,
                'formatted_total_cost' => $formatted_total_cost
            ]);

            // Logi danych do laravel.log
            Log::info('Dane do zapisu w sesji do widoku:', [
                'destination' => $trip->destination,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'price' => $price,
                'participants_label' => session('participants_label'),
                'formatted_prepayment' => session('formatted_prepayment'),
                'formatted_total_prepayment' => session('formatted_total_prepayment'),
                'formatted_total_cost' => session('formatted_total_cost')
            ]);
        }

        // Pobieranie danych z sesji do widoku
        $data = [
            'destination' => session('destination'),
            'start_date' => session('start_date'),
            'end_date' => session('end_date'),
            'price' => session('price'),
            'participant_count' => session('participant_count'),
            'participants_label' => session('participants_label'),
            'formatted_total_prepayment' => session('formatted_total_prepayment'),
            'formatted_total_cost' => session('formatted_total_cost')
        ];

        return view('service.payment', $data);                      // Przekazanie danych do widoku
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
