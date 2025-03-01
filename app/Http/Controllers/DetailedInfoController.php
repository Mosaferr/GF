<?php
// app/Http/Controllers/DetailedInfoController
namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
use App\Models\UserDate;
use App\Models\Client;
use App\Models\ClientDate;
use App\Models\Address;
use App\Models\Citizenship;
use App\Models\City;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ConfirmationController;

class DetailedInfoController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Pobierz rekord z tabeli users_dates
        $userDate = UserDate::where('user_id', $user->id)->first();
        $dateId = $userDate ? $userDate->date_id : null;
        $date = Date::find($dateId);				// Pobierz Date na podstawie date_id

        // Pobierz trip_id z obiektu Date
        $tripId = $date ? $date->trip_id : null;
        $trip = Trip::find($tripId);				// Pobierz Trip na podstawie trip_id

        // Dane do przekazania do widoku
        $data = [
            'destination' => $trip ? $trip->destination : null,
            'start_date' => $date ? Carbon::parse($date->start_date)->format('d.m') . ' - ' . Carbon::parse($date->end_date)->format('d.m.Y') : null,
            'name' => $user->name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'email' => $user->email,
        ];

    // Log::info('Dane do przekazania do widoku:', ['data' => $data]);

    // Debugowanie danych
    // dd($data); // Zatrzyma wykonanie kodu i wyświetli zawartość $data

        // Widok z nagłówkami HTTP wyłączającymi cache po 10 sekundach
        // return response()
        //     ->view('service.detailed_info', $data)
        //     ->header('Cache-Control', 'private, max-age=10')
        //     ->header('Expires', gmdate('D, d M Y H:i:s \G\M\T', time() + 10));

        return view('service.detailed_info', $data);
    }

    public function store(Request $request)
    {
        $user = Auth::user();                                                   // Pobierz zalogowanego użytkownika
        $leaderId = Client::where('user_id', $user->id)->value('leader_id');    // Pobierz `leader_id` głównego uczestnika
        $participants = $request->input('participants');                    // Pobierz dane uczestników

        // Ponownie pobieramy date_id i trip_id
        $userDate = UserDate::where('user_id', $user->id)->first();
        $dateId = $userDate ? $userDate->date_id : null;
        $date = Date::find($dateId);
        $tripId = $date ? $date->trip_id : null;
        // $trip = Trip::find($tripId);

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
            // 'participants.*.gender' => 'nullable|string',
            // 'participants.*.passport_number' => 'required|string|regex:/^[a-zA-Z0-9]{7,10}$/|unique:participants,passport_number',
            'participants.*.passport_number' => 'required|string',
            'participants.*.issue_date' => 'required|date|before_or_equal:today',
            // 'participants.*.expiry_date' => 'required|date|after:today|after_or_equal:'.now()->addMonths(3),
            'participants.*.expiry_date' => 'required|date|after:today',
            'participants.*.street' => 'required|string',
            'participants.*.house_number' => 'required|string',
            'participants.*.apartment_number' => 'nullable|string',
            'participants.*.postal_code' => 'required|string|max:20',
            'participants.*.city_name' => 'required|string|alpha|min:2|max:100',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Sprawdzanie liczby dodanych uczestników
        $participantCount = $user->participants;                       // Odczytanie zadeklarowanych uczestników z bazy danych
        $addedParticipants = count($request->input('participants', []));    // Liczba uczestników przesłanych w formularzu

        // Log::info('Wartość participants z bazy danych: ' . $user->participants);

        // Sprawdzenie, czy liczba uczestników przekracza zadeklarowaną liczbę
        if ($addedParticipants > $participantCount) {
            Log::error('Przekroczono liczbę zadeklarowanych uczestników.');
            return back()->with('error', 'Liczba dodanych uczestników jest większa niż zadeklarowana. Proszę jeszcza raz podać dane.');
        }

        // Sprawdzenie, czy liczba uczestników jest mniejsza niż zadeklarowana liczba
        if ($addedParticipants < $participantCount) {
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
                        'issue_date' => $participantData['issue_date'],
                        'expiry_date' => $participantData['expiry_date'],
                        'address_id' => $address->id,

                        'stage' => 'zapisany',                      // NOWE
                    ]
                );
                // Log::info('Pierwszy uczestnik został zaktualizowany lub utworzony.', ['client_id' => $client->id]);
            } else {
                // Kolejni uczestnicy - nowi klienci, ale także przypisujemy user_id zalogowanego użytkownika
                $client = Client::create([
                    'user_id' => $user->id,                         // Dodanie user_id do każdego kolejnego uczestnika
                    'name' => $participantData['name'],
                    'middle_name' => $participantData['middle_name'] ?? null,
                    'last_name' => $participantData['last_name'],
                    'email' => $participantData['email'],
                    'birth_date' => $participantData['birth_date'],
                    'phone' => $participantData['phone'],
                    'pesel' => $participantData['pesel'],
                    'citizenship_id' => $citizenship->id,
                    'passport_number' => $participantData['passport_number'],
                    'issue_date' => $participantData['issue_date'],
                    'expiry_date' => $participantData['expiry_date'],
                    'address_id' => $address->id,

                    'leader_id' => $leaderId,                   // Przypisanie leader_id dla wszystkich uczestników
                    'stage' => 'zapisany',                      // Przypisanie stage dla wszystkich uczestników
                ]);

                // Dodanie wpisu do tabeli clients_dates
                ClientDate::create([
                    'client_id' => $client->id,
                    'date_id' => $dateId,
                    'trip_id' => $tripId,
                ]);

                // Log::info('Nowy klient i powiązane daty zostały utworzone.', ['client_id' => $client->id]);
            }
        }

        Log::info("Przed wysłaniem maila, uczestnicy: " . json_encode(Client::where('leader_id', $leaderId)->pluck('id')));

        // Wysłanie e-maila do lidera
        $confirmationController = new ConfirmationController();
        $confirmationController->sendConfirmationEmail($dateId);

        return redirect()->route('service.payment');
        // return redirect()->route('service.payment')->with('success', 'Dane zostały zapisane.');
    }
}
