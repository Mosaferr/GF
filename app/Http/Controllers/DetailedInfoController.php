<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
use App\Models\UserDate;
use App\Models\Client;
use App\Models\Address;
use App\Models\Citizenship;
use App\Models\City;
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

            Log::info('Wartość participant_count z bazy danych: ' . $user->participant_count);

            // Ustaw dane w sesji
            session([
                'destination' => $trip ? $trip->destination : null,
                'start_date' => $date ? Carbon::parse($date->start_date)->format('d.m') . ' - ' . Carbon::parse($date->end_date)->format('d.m.Y') : null,
                'name' => $user->name,
                'last_name' => $user->last_name,
                'phone' => $user->phone,
                'email' => $user->email,

                'participant_count' => $user->participant_count,  // Dodanie participant_count do sesji
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

        // Log::info('Data sent to view:', ['data' => $data]);
        return view('service.detailed_info', $data);
    }

    public function store(Request $request)
    {
        // Log::info('Rozpoczęcie zapisu danych w store method.');

        $user = Auth::user();                                       // Pobierz zalogowanego użytkownika
        $participants = $request->input('participants');            // Pobierz dane uczestników

        // Walidacja danych uczestników
        $rules = [
            'participants.*.name' => 'required|string|alpha|min:3|max:20',
            'participants.*.middle_name' => 'nullable|string|alpha|min:3|max:20',
            'participants.*.last_name' => 'required|string|alpha|min:2|max:50',
            'participants.*.phone' => 'nullable|regex:/^\+?[0-9\s]+$/|min:8|max:20',
            'participants.*.email' => 'required|email',
            // 'participants.*.birth_date' => 'required|date|before_or_equal:'.now()->subYears(2),
            'participants.*.birth_date' => 'required|date',
            // 'participants.*.pesel' => 'required|string|digits:11|unique:participants,pesel',
            'participants.*.pesel' => 'required|string',
            'participants.*.citizenship' => 'required|string',
            // 'participants.*.passport_number' => 'required|string|regex:/^[a-zA-Z0-9]{7,10}$/|unique:participants,passport_number',
            'participants.*.passport_number' => 'required|string',
            'participants.*.passport_issue_date' => 'required|date|before_or_equal:today',
            // 'participants.*.passport_expiry_date' => 'required|date|after:today|after_or_equal:'.now()->addMonths(3),
            'participants.*.passport_expiry_date' => 'required|date|after:today',
            'participants.*.street' => 'required|string',
            'participants.*.house_number' => 'required|string',
            'participants.*.apartment_number' => 'nullable|string',
            'participants.*.postal_code' => 'required|string',
            'participants.*.city_name' => 'required|string|alpha',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Log::error('Walidacja nie powiodła się.', ['errors' => $validator->errors()]);
            return back()->withErrors($validator)->withInput();
        } else {
            // Log::info('Walidacja danych zakończona sukcesem.');

                                    
            // Session::forget('error');                                    // Czyszczenie wcześniejszych błędów

            // Sprawdzanie liczby dodanych uczestników
            $participantCount = session('participant_count');               // Odczytanie zadeklarowanych uczestników z sesji
            $addedParticipants = count($request->input('participants', [])); // Liczba uczestników przesłanych w formularzu

            // Dodanie logów dla śledzenia wartości zmiennych
            Log::info('Liczba zadeklarowanych uczestników (session):', ['participant_count' => $participantCount]);
            Log::info('Liczba dodanych uczestników (formularz):', ['addedParticipants' => $addedParticipants]);

            // Sprawdzenie, czy liczba uczestników przekracza zadeklarowaną liczbę
            if ($addedParticipants > $participantCount) {
                Log::error('Przekroczono liczbę zadeklarowanych uczestników.');
                return back()->with('error', 'Liczba dodanych uczestników jest większa niż zadeklarowana. Proszę jeszcza raz podać dane.');
            }

            // Sprawdzenie, czy liczba uczestników jest mniejsza niż zadeklarowana liczba
            if ($addedParticipants < $participantCount) {
                Log::warning('Liczba dodanych uczestników jest mniejsza niż zadeklarowana.');
                return back()->with('error', 'Liczba dodanych uczestników jest mniejsza niż zadeklarowana. Proszę podać dane wszystkich.');
            }
                        

        // Zapisywanie danych uczestników do bazy danych
            foreach ($participants as $index => $participantData) {
                $city = City::firstOrCreate(['city_name' => $participantData['city_name']]);
                // Log::info('Miasto zostało utworzone lub znalezione.', ['city_id' => $city->id]);

                $address = Address::updateOrCreate([
                    'street' => $participantData['street'],
                    'house_number' => $participantData['house_number'],
                    'apartment_number' => $participantData['apartment_number'],
                    'postal_code' => $participantData['postal_code'],
                    'city_id' => $city->id,
                ]);
                // Log::info('Adres został utworzony lub zaktualizowany.', ['address_id' => $address->id]);

                $citizenship = Citizenship::updateOrCreate(
                    ['citizenship' => $participantData['citizenship']]
                );
                // Log::info('Obywatelstwo zostało utworzone lub zaktualizowane.', ['citizenship_id' => $citizenship->id]);

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
                    // Log::info('Pierwszy uczestnik został zaktualizowany lub utworzony.', ['client_id' => $client->id]);
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
            return redirect()->route('service.payment');
            // return redirect()->route('service.payment')->with('success', 'Dane zostały zapisane.');
        }
    }
}
