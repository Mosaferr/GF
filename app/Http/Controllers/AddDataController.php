<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest; // Zdefiniuj odpowiednie reguły walidacji w tym requestcie
use App\Models\Client;
use App\Models\Address;
use App\Models\Trip;
use App\Models\Date;
use Illuminate\View\View;
use Illuminate\Http\Request;

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
    public function store(ClientRequest $request)
    {
        // Walidacja
        $validated = $request->validated();

        // Tworzenie adresu
        $address = Address::create([
            'street' => $validated['street'],
            'house_number' => $validated['house_number'],
            'apartment_number' => $validated['apartment_number'],
            'postal_code' => $validated['postal_code'],
            'city_name' => $validated['city_name']
        ]);

        // Tworzenie klienta
        $client = Client::create([
            'name' => $validated['name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'birth_date' => $validated['birth_date'],
            'pesel' => $validated['pesel'],
            'passport_number' => $validated['passport_number'],
            'issue_date' => $validated['issue_date'],
            'expiry_date' => $validated['expiry_date'],
            'citizenship_id' => $validated['citizenship_id'],
            'address_id' => $address->id,
            'trip_id' => $validated['trip'],
            'start_date_id' => $validated['start_date'],
            'stage' => $validated['stage']
        ]);

        return redirect()->route('admin.clientlist')->with('success', 'Klient został dopisany.');
    }
}
