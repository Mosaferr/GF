<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
use App\Models\UserDate;
use App\Models\Client;
use App\Models\Address;
use App\Models\Citizenship;
use App\Models\City;
use App\Models\ClientDate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class DetailedInfoController extends Controller
{
                                                
    public function show()
    {
        $user = Auth::user();

        // Sprawdź, czy dane są już w sesji
        if (!session()->has('destination') || !session()->has('start_date')) {

            // Pobierz rekord z tabeli users_dates
            $userDate = UserDate::where('user_id', $user->id)->first();

            $dateId = $userDate ? $userDate->date_id : null;
            $date = Date::find($dateId);

            // Pobierz trip_id z obiektu Date
            $tripId = $date ? $date->trip_id : null;
            // Pobierz Trip na podstawie trip_id
            $trip = Trip::find($tripId);

            // Ustaw dane w sesji
            session([
                'destination' => $trip ? $trip->destination : null,
                'start_date' => $date ? Carbon::parse($date->start_date)->format('d.m') . ' - ' . Carbon::parse($date->end_date)->format('d.m.Y') : null,
                'name' => $user->name,
                'last_name' => $user->last_name,
                'phone' => $user->phone,
                'email' => $user->email,
            ]);
        }

        // Pobierz dane z sesji
        $tripId = session('destination');
        $dateId = session('start_date');

        $trip = Trip::find($tripId);
        $date = Date::find($dateId);

        $data = [
            'destination' => session('destination'),
            'start_date' => session('start_date'),
            'name' => session('name'),
            'last_name' => session('last_name'),
            'phone' => session('phone'),
            'email' => session('email'),
        ];

        Log::info('Data sent to view:', ['data' => $data]);
        return view('service.detailed_info', $data);
    }
                                                
    public function store(Request $request)
    {
        Log::info('Rozpoczęcie zapisu danych w store method.');

        $user = Auth::user();                                       // Pobierz zalogowanego użytkownika
        $participants = $request->input('participants');            // Pobierz dane uczestników

        // Walidacja danych uczestników
        $rules = [
            'participants.*.name' => 'required|string|max:255',
            'participants.*.last_name' => 'required|string|max:255',
            'participants.*.birth_date' => 'required|date',
            'participants.*.phone' => 'nullable|string|max:15',
            'participants.*.email' => 'required|email',
            'participants.*.pesel' => 'required|string',
            'participants.*.citizenship' => 'required|string',
            'participants.*.passport_number' => 'required|string',
            'participants.*.passport_issue_date' => 'required|date',
            'participants.*.passport_expiry_date' => 'required|date|after:participants.*.passport_issue_date',
            'participants.*.street' => 'required|string',
            'participants.*.house_number' => 'required|string',
            'participants.*.apartment_number' => 'nullable|string',
            'participants.*.postal_code' => 'required|string',
            'participants.*.city_name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Log::error('Walidacja nie powiodła się.', ['errors' => $validator->errors()]);
            return back()->withErrors($validator)->withInput();
        } else {
            Log::info('Walidacja danych zakończona sukcesem.');

            // Zapisywanie danych uczestników do bazy danych
            foreach ($participants as $index => $participantData) {
                $city = City::firstOrCreate(['city_name' => $participantData['city_name']]);
                Log::info('Miasto zostało utworzone lub znalezione.', ['city_id' => $city->id]);

                $address = Address::updateOrCreate([
                    'street' => $participantData['street'],
                    'house_number' => $participantData['house_number'],
                    'apartment_number' => $participantData['apartment_number'],
                    'postal_code' => $participantData['postal_code'],
                    'city_id' => $city->id,
                ]);
                Log::info('Adres został utworzony lub zaktualizowany.', ['address_id' => $address->id]);

                $citizenship = Citizenship::updateOrCreate(
                    ['citizenship' => $participantData['citizenship']]
                );
                Log::info('Obywatelstwo zostało utworzone lub zaktualizowane.', ['citizenship_id' => $citizenship->id]);

                // Dla pierwszego uczestnika aktualizujemy lub tworzymy rekord na podstawie user_id
                if ($index == 0) {
                    $client = Client::updateOrCreate(
                        ['user_id' => $user->id],
                        [
                            'name' => $participantData['name'],
                            'middle_name' => $participantData['middle_name'] ?? null,
                            'last_name' => $participantData['last_name'],
                            'email' => $participantData['email'],
                            'birth_date' => $participantData['birth_date'],
                            'phone' => $participantData['phone'],
                            'pesel' => $participantData['pesel'],
                            'citizenship_id' => $citizenship->id,
                            'passport_number' => $participantData['passport_number'],
                            'passport_issue_date' => $participantData['passport_issue_date'],
                            'passport_expiry_date' => $participantData['passport_expiry_date'],
                            'address_id' => $address->id,

                            'stage' => 'zapisany',                 // NOWE
                        ]
                    );
                    Log::info('Pierwszy uczestnik został zaktualizowany lub utworzony.', ['client_id' => $client->id]);
                } else {
                    // Kolejni uczestnicy - nowi klienci, ale także przypisujemy user_id zalogowanego użytkownika
                    $client = Client::create([
                        'user_id' => $user->id,  // Dodanie user_id do każdego kolejnego uczestnika
                        'name' => $participantData['name'],
                        'middle_name' => $participantData['middle_name'] ?? null,
                        'last_name' => $participantData['last_name'],
                        'email' => $participantData['email'],
                        'birth_date' => $participantData['birth_date'],
                        'phone' => $participantData['phone'],
                        'pesel' => $participantData['pesel'],
                        'citizenship_id' => $citizenship->id,
                        'passport_number' => $participantData['passport_number'],
                        'passport_issue_date' => $participantData['passport_issue_date'],
                        'passport_expiry_date' => $participantData['passport_expiry_date'],
                        'address_id' => $address->id,
                    ]);
                    Log::info('Nowy klient został utworzony.', ['client_id' => $client->id]);
                }
            }

            Log::info('Zakończono zapisywanie wszystkich uczestników.');
            return redirect()->route('service.payment')->with('success', 'Dane zostały zapisane.');
        }
    }
}
