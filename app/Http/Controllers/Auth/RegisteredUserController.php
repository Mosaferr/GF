<?php
// app/Http/Controllers/Auth/RegisteredUserController

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Trip;
use App\Models\UserDate;
use App\Models\Date;
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
        return view('auth.register', ['trips' => $trips]); // Przekazujemy zmienną $trips do widoku
        // return view('auth.register');
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

            event(new Registered($user));

            Auth::login($user);

          // Wyślij powiadomienie email
            $user->notify(new SpotAvailableNotification());
  
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
