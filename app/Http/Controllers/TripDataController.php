<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Trip;
use App\Models\Date;
use App\Models\User;
// use App\Models\Address;
// use App\Models\City;
// use App\Models\Citizenship;
// use App\Models\ClientDate;
// use App\Models\UserDate;
use App\Http\Controllers\Controller;
// use App\Http\Requests\ClientRequest;    // Zdefiniuj odpowiednie reguły walidacji w tym requestcie
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
// use Illuminate\View\View;

class TripDataController extends Controller
{
    /** Wyświetla formularz edycji dla wybranego klienta.
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     *******************************************/

    public function edit($tripId, $dateId, Request $request)
    {
        // Pobranie wycieczki i odpowiadającego jej terminu
        $trip = Trip::findOrFail($tripId);
        $date = Date::where('trip_id', $tripId)->where('id', $dateId)->firstOrFail();

        $redirectUrl = $request->query('redirect_url', route('admin.triplist'));   // Domyślny redirect do listy
        return view('admin.tripdata', compact('trip', 'date', 'redirectUrl'));
    }

    /** Aktualizuje dane klienta.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *******************************************/

    public function update(Request $request, $tripId, $dateId)
    {
        $trip = Trip::findOrFail($tripId);
        $date = Date::where('trip_id', $tripId)->where('id', $dateId)->firstOrFail();

        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric|min:0',
            'available_seats' => 'required|integer|min:0',
            'total_seats' => 'required|integer|min:0',
        ]);

        $date->update($validatedData);

        $redirectUrl = $request->input('redirect_url', route('admin.triplist'));
        return redirect($redirectUrl)->with('success', 'Dane terminu zostały zaktualizowane.');
    }


    /** Usuwanie klienta.
     *******************************************/

    public function destroy($id, Request $request)
    {
        DB::beginTransaction(); // Rozpoczęcie transakcji
        try {

            // Logowanie początku operacji
            Log::info("\n\n------------ START LOGÓW ------------\n");

            // 1. Znalezienie klienta  po ID
            $client = Client::findOrFail($id);
            Log::info("1.1. Znaleziono klienta (dane z clients): ", $client->toArray());

            // Zwiększenie liczby miejsc o 1
            $dateId = $client->dates()->first()->id;        // Pobranie ID daty powiązanej z klientem
            Date::where('id', $dateId)->increment('available_seats', 1);

            // *****  Jeśli klient został dodany przez administratora
            if ($client->user_id == 1) {
                Log::info("Usuwanie klienta dodanego przez administratora: ", $client->toArray());

                // Usunięcie powiązań klienta z datami
                $client->dates()->detach();
                Log::info("Powiązania klienta z tabeli clients_dates zostały usunięte dla ID: {$client->id}");

                // Usunięcie adresu, jeśli klient jest ostatnim, który go używa
                $address = $client->address;
                if ($address && $address->clients()->count() <= 1) {
                    $address->delete();
                    Log::info("Adres klienta ID: {$client->id} został usunięty.");
                }

                //
                // Usunięcie miasta, jeśli klient jest ostatnim, który go używa
                $city = $address ? $address->city : null;
                // Sprawdź, czy miasto istnieje i czy jest ostatnim używanym
                if ($city && $city->addresses()->count() <= 1) {
                    $city->delete();
                    Log::info("Miasto {$city->city_name} zostało usunięte, ponieważ było ostatnio używane.");
                } else {
                    Log::info("Miasto jest współdzielone lub nie istnieje. Nie usuwam miasta.");
                }
                //

                // Usunięcie klienta
                $client->delete();
                Log::info("Klient ID: {$client->id} został usunięty.");

                DB::commit();

                // Wczesne rzekierowanie na odpowiednią stronę
                $redirectUrl = $request->input('redirect_url', route('admin.clientlist'));
                return redirect($redirectUrl)->with('success', 'Klient został usunięty.');
            }
            // *****  Koniec "Jeśli klient został dodany przez administratora"


            // Przechowanie wartości w tymczasowych zmiennych
            $leaderId = $client->leader_id;		        // przechowanie leader_id klienta w zmiennej
            $clientId = $client->id;			        // przechowanie ID klienta
            $clientleaderId = Client::where('leader_id', $leaderId)
                                    ->orderBy('id')
                                    ->first()->id;  	// przechowanie ID klienta, który jest liderem
            $userId = $client->user_id;     	        // Powiązanie z user_id (możliwe ID lidera) - DO USUNIĘCIA.

            Log::info("\n 1.2. Usuwanie klienta: ID = {$clientId}, leader_id = {$leaderId}, ID klienta, który jest liderem = {$clientleaderId}, user_id={$userId}");

            // 2. Usunięcie powiązań klienta z datami
            $client->dates()->detach();
            Log::info("2. Usunięto powiązane rekordy z tabeli clients_dates klienta o ID: {$client->id}  \n Dane klienta: ID = {$clientId}, leader_id = {$leaderId}, ID klienta, który jest liderem = {$clientleaderId}, user_id={$userId}");

            // 3. Usunięcie adresu, jeśli klient jest ostatnim, który go używa
            $address = $client->address;
            Log::info("3.1. Pobranie adresu powiązanego z klientem. Address: ", $address ? $address->toArray() : 'Brak adresu');

            if ($address && $address->clients()->count() <= 1) {
                Log::info("3.2. Adres jest przypisany tylko do jednego klienta. Rozpoczynam usuwanie.");
                $address->delete();                     // Usunięcie adresu jeśli jest przypisany tylko do tego klienta
                Log::info("3.3. Usunięto adres klienta o ID: {$client->id}");
            } else {
                Log::info("3.4. Adres jest współdzielony lub nie istnieje. Nie usuwam.");
            }

            //
            // Usunięcie miasta, jeśli klient jest ostatnim, który go używa
            $city = $address ? $address->city : null;
            // Sprawdź, czy miasto istnieje i czy jest ostatnim używanym
            if ($city && $city->addresses()->count() <= 1) {
                $city->delete();
                Log::info("Miasto {$city->city_name} zostało usunięte, ponieważ było ostatnio używane.");
            } else {
                Log::info("Miasto jest współdzielone lub nie istnieje. Nie usuwam miasta.");
            }
            //

            // 4. Ustawienie leader_id i user_id na null dla klientów w grupie lidera
            if ($leaderId) {
                Client::where('leader_id', $leaderId)->update(['leader_id' => null]);
                Log::info("4. Powiązania leader_id dla klientów grupy lidera zostały zerwane");
            }

            // 5. Usunięcie klienta z tabeli clients
            $client->delete();
            Log::info("5. Klient ID={$clientId} został usunięty");

            // 6. Zmniejszenie liczby uczestników (participants) dla lidera
            if ($leaderId) {
                User::where('id', $leaderId)->decrement('participants');
                // Pobranie aktualnej liczby participants
                $currentParticipants = User::where('id', $leaderId)->value('participants');
                Log::info("6. Liczba participants dla lidera ID={$leaderId} została zmniejszona do: {$currentParticipants} ");
            }
            if ($currentParticipants > 0) {
            // 7. Przywrócenie leader_id dla pozostałych klientów, jeśli lider pozostaje
                Client::whereNull('leader_id')->update([
                    'leader_id' => $leaderId,
                ]);
                Log::info("7. leader_id przywrócone pozostałym klientom grupy lidera ID={$leaderId}");
            } else {
            // 8. Usunięcie lidera z tabel users i users_dates, jeśli `participants` wynosi 0
                User::where('id', $leaderId)->delete();
                Log::info("10.1 Lider ID={$leaderId} został usunięty z tabeli users");
                // Usunięcie lidera z users_dates
                DB::table('users_dates')->where('user_id', $leaderId)->delete();	// Query Builder - to samo co niżej
                // UserDate::where('user_id', $leaderId)->delete();					// Eloquent - to samo co wyżej (choć nie wiem czy do końca)
                Log::info("10.2 Powiązanie lidera ID={$leaderId} z tabelą users_dates zostało usunięte");
            }

            DB::commit(); // Zatwierdzenie transakcji

            Log::info("Operacja usuwania klienta zakończona sukcesem.");
            Log::info("\n----------------- KONIEC LOGÓW -----------------\n\n");


            // Przekierowanie na odpowiednią stronę dla pozostałych przypadkó
            $redirectUrl = $request->input('redirect_url', route('admin.clientlist'));
            return redirect($redirectUrl)->with('success', 'Klient oraz wszystkie powiązane dane zostały pomyślnie usunięte.');

        } catch (\Exception $e) {
            DB::rollBack(); // Cofnięcie transakcji
            Log::error("Błąd podczas usuwania klienta ID={$id}: " . $e->getMessage());

            // Obsługa błędu. Przekierowanie na odpowiednią stronę
            $redirectUrl = $request->input('redirect_url', route('admin.clientlist'));
            return redirect($redirectUrl)->with('error', 'Wystąpił problem podczas usuwania klienta.');
            // return redirect()->route('admin.clientlist')->with('error', 'Wystąpił problem podczas usuwania klienta. Skontaktuj się z administratorem.');
        }
    }
}
