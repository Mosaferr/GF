<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Trip;
use App\Models\UserDate;
use App\Models\Date;
use App\Models\Client;
use App\Models\ClientDate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserRequest;        //reguły walidacji
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules;
use Illuminate\View\View;
// use Illuminate\Support\Facades\Log;

use App\Notifications\SpotAvailableNotification;

class RegisteredUserController extends Controller
{
    /** Display the registration view. */
    public function create(): View
    {
        $trips = Trip::all();                               // Pobieramy wszystkie wyprawy
        return view('auth.register', ['trips' => $trips]);  // Przekazujemy zmienną $trips do widoku
    }

    /** Handle an incoming registration request.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Pobranie daty na podstawie start_date przekazanego z formularza
        $date = Date::find($request->start_date);
        // Zmniejszenie liczby dostępnych miejsc o liczbę zadeklarowanych uczestników
        $remainingSeats = $date->available_seats - $validated['participants'];
        if ($remainingSeats >= 0) {
            $date->available_seats = $remainingSeats;
            $date->save();

            // Tworzenie użytkownika...
            $user = User::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'participants' => $validated['participants'],
                'password' => Hash::make($validated['password']),
            ]);

            $leaderId = $user->id;          // Przypisanie leader_id do identyfikatora utworzonego użytkownika

            // Przypisanie start_date jako date_id w tabeli user_dates, tworząc połączenie między użytkownikiem a datą.
            UserDate::create([
                'user_id' => $user->id,
                'date_id' => $validated['start_date'],
            ]);

            // OBSŁUGA KLIENTA
            $existingAddress = \App\Models\Address::first();        // Sprawdzenie, czy istnieją wartości w tabelach `addresses`
            if (!$existingAddress) {
                $existingCity = \App\Models\City::first();          // Sprawdzenie, czy istnieją wartości w tabeli `cities`
                if (!$existingCity) {
                    $existingCity = \App\Models\City::create([       // Tworzenie tymczasowego rekordu w tabeli `cities`
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
            $existingCitizenshipId = \App\Models\Citizenship::first()->id ?? null;      // Zmień na rzeczywisty ID istniejącego obywatelstwa

            // Tworzenie klienta...
            if ($user->id != 1) {                                   //  OMIŃ dla usera o ID=1. Ma być adminem i nie wyświetlać się jako client.
                $client = Client::create([
                    'user_id' => $user->id,
                    'name' => $validated['name'],
                    'last_name' => $validated['last_name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'birth_date' => now(),                          // Tymczasowa wartość
                    'gender' => 'M',                                // Tymczasowa wartość
                    'pesel' => '00000000000',                       // Tymczasowa wartość
                    'citizenship_id' => $existingCitizenshipId,     // Użyj istniejącej wartości lub null
                    'passport_number' => 'TEMP',                    // Tymczasowa wartość
                    'issue_date' => now(),                          // Tymczasowa wartość
                    'expiry_date' => now()->addYear(),              // Tymczasowa wartość
                    'address_id' => $existingAddressId,             // Użyj istniejącej wartości lub null
                    'leader_id' => $leaderId,                       // Ustawienie leader_id na identyfikator nowo utworzonego użytkownika
                    'stage' => 'zarezerwowany',
                ]);
                $client->save();                // Zapisanie klienta

                // Przypisanie start_date jako date_id w tabeli clients_dates, tworząc połączenie między użytkownikiem a datą.
                ClientDate::create([
                    'client_id' => $client->id,
                    'date_id' => $validated['start_date'],
                ]);
            }

            event(new Registered($user));
            Auth::login($user);
            // ZAKOMENTOWANIE MAILINGU (3 WIERSZE) *************************************************************************
            if ($user->id != 1) {            //  OMIŃ dla usera o ID=1.
            		$user->notify(new SpotAvailableNotification());         // Wyślij powiadomienie email
            }
            // KONIEC ZAKOMENTOWANIA MAILINGU (3 WIERSZE) ******************************************************************

            // Zapisanie danych w sesji
            session([
                'destination' => $validated['trip'],
                'start_date' => $validated['start_date'],
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'participants' => $validated['participants'],
            ]);
            return redirect()->route('service.available');

        } else {
            return redirect()->route('service.unavailable');
        }
    }
}
