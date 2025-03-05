<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;        //reguły walidacji w tym requestcie
use App\Http\Requests\AddressRequest;        //reguły walidacji w tym requestcie
use App\Models\City;
use App\Models\Client;
use App\Models\Address;
use App\Models\Trip;
use App\Models\Date;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AddDataController extends Controller
{
    // Wyświetlanie formularza rejestracji
    public function create(): View
        {
            $trips = Trip::all();                           // Pobranie wszystkich wypraw
            $dates = Date::all();                           // Pobranie wszystkich dostępnych terminów

            return view('admin.adddata', [      // Przekazanie zmiennych $trips i $dates do widoku
                'trips' => $trips,
                'dates' => $dates
            ]);
        }

    // Przechwytywanie i przechowywanie danych formularza rejestracji
    public function store(ClientRequest $clientRequest, AddressRequest $addressRequest)
    {
        // dd($request->all());

        // Walidacja
        $validatedClient = $clientRequest->validated();
        $validatedAddress = $addressRequest->validated();       // walidacja adresu

        // Sprawdzenie, czy podano city_id czy city_name
        if (!empty($validatedAddress['city_id'])) {
            $city = City::find($validatedAddress['city_id']);
        } else {
            $city = City::firstOrCreate(['city_name' => $validatedAddress['city_name']]);   // Sprawdzenie, czy miasto już istnieje
        }

        // Sprawdzenie, czy znaleziono lub utworzono miasto
        if (!$city) {
            return redirect()->back()->withErrors(['city' => 'Nie znaleziono podanego miasta.']);
        }

        // Tworzenie adresu
        $address = Address::create([
            'street' => $validatedAddress['street'],
            'house_number' => $validatedAddress['house_number'],
            'apartment_number' => $validatedAddress['apartment_number'],
            'postal_code' => $validatedAddress['postal_code'],
            'city_id' => $city->id,                                 // Przypisz id miasta
        ]);

        if (!$address) {
            return redirect()->back()->withErrors(['address' => 'Nie udało się utworzyć adresu.']);
        }

        // Pobranie daty na podstawie start_date przekazanego z formularza
        $date = Date::find($validatedClient['start_date']);
        if (!$date) {
            return redirect()->back()->withErrors(['start_date' => 'Nie znaleziono wybranego terminu.']);
        }
        // Zmniejszenie liczby dostępnych miejsc o jedno
        $remainingSeats = $date->available_seats - 1;
        if ($remainingSeats >= 0) {
            $date->available_seats = $remainingSeats;
            $date->save();
        } else {
            return redirect()->back()->withErrors(['available_seats' => 'Brak dostępnych miejsc.']);
        }

        // Tworzenie klienta
        $client = Client::create(array_merge(
            $validatedClient,               // Wszystkie zwalidowane dane
            [
                'address_id' => $address->id,       // Pole niezawarte w walidacji
                'user_id' => Auth::id() ?? 1,       // Dodanie user_id. Tutaj przyjmuje ID aktualnie zalogowanego użytkownika lub wartość 1.
                'leader_id' => Auth::id(),          // Dodanie leader_id. Tutaj przyjmuje ID aktualnie zalogowanego użytkownika.
            ]
        ));

        if (!$client) {
            return redirect()->back()->withErrors(['client' => 'Nie udało się utworzyć klienta.']);
        }

        $client->dates()->attach($validatedClient['start_date']);

        // Przekierowanie na odpowiednią stronę
        $redirectUrl = $clientRequest->input('redirect_url', route('admin.clientlist'));
        return redirect($redirectUrl)->with('success', 'Klient został dopisany.');
    }
}
