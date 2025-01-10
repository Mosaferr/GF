<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Client;
use App\Models\Date;
use App\Models\User;
use App\Models\Trip;
use App\Models\Address;
use App\Models\City;
use App\Models\Citizenship;
use App\Models\ClientDate;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $clients = $request->user()->clients()->get();
        return view('profile.edit', [
            'user' => $request->user(),
            'clients' => $clients,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated')->with('success', 'Dane zostały zmienione.');
    }

    /**
     * Delete the user's account.
     */

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        DB::beginTransaction();
        try {
            // Usuń powiązania użytkownika z tabelą users_dates
            $user->dates()->detach();

            // Ustaw user_id na 1 w tabeli clients dla klientów powiązanych z tym użytkownikiem
            $user->clients()->update(['user_id' => 1]);

            // Wylogowanie użytkownika
            Auth::logout();

            // Usunięcie użytkownika z tabeli users
            $user->delete();

            DB::commit();

            // Inwalidacja sesji
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/')->with('success', 'Konto zostało usunięte.');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::route('profile.edit')->with('error', 'Wystąpił błąd podczas usuwania konta.');
        }
    }


    public function deleteClients(Request $request)
    {
        $request->validateWithBag('clientDeletion', [
            'password' => ['required', 'current_password'],
            'client_ids' => 'required|array',
            'client_ids.*' => 'exists:clients,id',
        ]);
        DB::beginTransaction();
        try {
            foreach ($request->client_ids as $clientId) {
                $client = Client::findOrFail($clientId);

                // Zwiększenie liczby miejsc
                $dateId = $client->dates()->first()->id;
                Date::where('id', $dateId)->increment('available_seats', 1);

                // Usunięcie powiązań z datami
                $client->dates()->detach();

                // Usunięcie adresu, jeśli nie jest współdzielony
                $address = $client->address;
                if ($address && $address->clients()->count() <= 1) {
                    $address->delete();
                }

                // Usunięcie miasta, jeśli nie jest współdzielone
                $city = $address ? $address->city : null;
                if ($city && $city->addresses()->count() <= 1) {
                    $city->delete();
                }

                // Usunięcie klienta
                $client->delete();

                // Zmniejszenie liczby uczestników
                User::where('id', $client->leader_id)->decrement('participants');
            }

            DB::commit();
            return redirect()->route('profile.edit')->with('success', 'Wybrani klienci zostali usunięci.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profile.edit')->with('error', 'Wystąpił błąd podczas usuwania klientów.');
        }
    }
}
