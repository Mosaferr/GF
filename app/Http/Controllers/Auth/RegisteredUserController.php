<?php
// app/Http/Controllers/Auth/RegisteredUserController

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Trip;
use App\Models\UserDate;
use App\Models\Date;
use App\Models\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Log;

use App\Notifications\SpotAvailableNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $trips = Trip::all(); // Pobieramy wszystkie wyprawy
        return view('auth.register', ['trips' => $trips]);          // Przekazujemy zmienną $trips do widoku
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'participant_count' => ['required', 'integer', 'min:1'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'trip' => 'required|exists:trips,id',
            'start_date' => 'required|exists:dates,id',
        ]);

        $date = Date::find($request->start_date);                   // Pobranie daty na podstawie start_date przekazanego z formularza

        $remainingSeats = $date->available_seats - $request->participant_count;

        if ($remainingSeats >= 0) {
            $date->available_seats = $remainingSeats;
            $date->save();

            // Tworzenie użytkownika...
            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'participant_count' => $request->participant_count,
                'password' => Hash::make($request->password),
            ]);

            UserDate::create([              // Nowe reguły
                'user_id' => $user->id,
                'date_id' => $request->start_date,
            ]);
                                            
        // Sprawdzenie, czy istnieją wartości w tabelach `addresses`
        $existingAddress = \App\Models\Address::first();
        if (!$existingAddress) {
            // Sprawdzenie, czy istnieją wartości w tabeli `cities`
            $existingCity = \App\Models\City::first();
            if (!$existingCity) {
                // Tworzenie tymczasowego rekordu w tabeli `cities`
                $existingCity = \App\Models\City::create([
                    'city_name' => 'Temporary City',
                ]);
            }
            // Tworzenie rekordu w tabeli `addresses` z odniesieniem do rekordu w tabeli `cities`
            $existingAddress = \App\Models\Address::create([
                'street' => 'Temporary Street',
                'house_number'=> '000',
                'apartment_number' => 'null',
                'postal_code'=> '00-000',
                'city_id' => $existingCity->id,
            ]);
        }
        $existingAddressId = $existingAddress->id;

            // Sprawdzenie, czy istnieją wartości w tabelach `citizenships`, i `clients`
            $existingCitizenshipId = \App\Models\Citizenship::first()->id ?? null; // Zmień na rzeczywisty ID istniejącego obywatelstwa
            $existingLeaderId = Client::first()->id ?? null; // Zmień na rzeczywisty ID istniejącego lidera

            // Tworzenie klienta...
            $client = Client::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'birth_date' => now(), // Tymczasowa wartość
                'gender' => 'M', // Tymczasowa wartość
                'pesel' => '00000000000', // Tymczasowa wartość
                'citizenship_id' => $existingCitizenshipId, // Użyj istniejącej wartości lub null
                'passport_number' => 'TEMP', // Tymczasowa wartość
                'passport_issue_date' => now(), // Tymczasowa wartość
                'passport_expiry_date' => now()->addYear(), // Tymczasowa wartość
                'address_id' => $existingAddressId, // Użyj istniejącej wartości lub null
                'leader_id' => $existingLeaderId, // Użyj istniejącej wartości lub null
                'stage' => 'zarezerwowany',
            ]);

            // Zapisanie klienta
            $client->save();
                                            
// ZAKOMENTOWANIE MAILINGU (3 WIERSZE)
            event(new Registered($user));
            Auth::login($user);
            // $user->notify(new SpotAvailableNotification());         // Wyślij powiadomienie email
// KONIEC ZAKOMENTOWANIA MAILINGU (3 WIERSZE)

            // Zapisanie danych w sesji
            session([
                'destination' => $request->destination,
                'start_date' => $request->start_date,
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
            return redirect()->route('service.available');

        } else {
                return redirect()->route('service.unavailable');
            }
        }
}
