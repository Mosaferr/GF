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

class AddDataController extends Controller
{
    // Wyświetlanie formularza rejestracji
    public function create(): View
        {
            $trips = Trip::all(); // Pobieramy wszystkie wyprawy
            $dates = Date::all(); // Pobieramy wszystkie dostępne terminy

            return view('admin.adddata', [
                'trips' => $trips,
                'dates' => $dates
            ]); // Przekazujemy zmienne $trips i $dates do widoku
        }

    // Przechwytywanie i przechowywanie danych formularza rejestracji
    public function store(ClientRequest $clientRequest, AddressRequest $addressRequest)
    {
        // dd($request->all());

        // Walidacja
        $validatedClient = $clientRequest->validated();
        $validatedAddress = $addressRequest->validated(); // WALIDACJA ADRESU

        // Sprawdź, czy miasto już istnieje
        $city = City::firstOrCreate(['city_name' => $validatedAddress['city_name']]);

        // Tworzenie adresu
        $address = Address::create([
            'street' => $validatedAddress['street'],
            'house_number' => $validatedAddress['house_number'],
            'apartment_number' => $validatedAddress['apartment_number'],
            'postal_code' => $validatedAddress['postal_code'],
            'city_id' => $city->id, // Przypisz id miasta
        ]);

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
            $validatedClient, // Wszystkie zwalidowane dane
            [
                'address_id' => $address->id,       // Pole niezawarte w walidacji
                'user_id' => auth()->id() ?? 1,     // Dodanie user_id. Tutaj przyjmuje ID aktualnie zalogowanego użytkownika lub wartość 1.
                'leader_id' => auth()->id(),        // Dodanie leader_id. Tutaj przyjmuje ID aktualnie zalogowanego użytkownika.
            ]
        ));

        $client->dates()->attach($validatedClient['start_date']);

        // Przekierowanie na odpowiednią stronę
        $redirectUrl = $clientRequest->input('redirect_url', route('admin.clientlist'));
        return redirect($redirectUrl)->with('success', 'Klient został dopisany.');
    }
}
