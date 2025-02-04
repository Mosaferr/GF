<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Trip;
use App\Models\Date;
use App\Models\Address;
use App\Models\City;
use App\Models\Citizenship;
use App\Models\ClientDate;
use App\Models\User;
// use App\Models\UserDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;    // reguły walidacji
use App\Http\Requests\AddressRequest;   // reguły walidacji
// use Illuminate\View\View;

class ClientDataController extends Controller
{
    /** Wyświetla formularz edycji dla wybranego klienta.
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     *******************************************/

    public function edit($id, Request $request)
    {
        // Pobranie klienta wraz z powiązanymi datami i wycieczkami przez clientsDates
        $client = Client::with(['dates.trip'])->findOrFail($id);
        // Pobranie listy wszystkich dostępnych destynacji
        $trips = Trip::all();
        // Pobranie domyślnej destynacji i terminu z bazy danych
        $selectedTripId = $client->dates->first()->trip->id;
        $selectedDateId = $client->dates->first()->id;
        // Pobranie wszystkich terminów dla wybranej destynacji
        $dates = Date::where('trip_id', $selectedTripId)->get();

        // Przekazanie danych do widoku
        $redirectUrl = $request->input('redirect_url', route('admin.clientlist'));
        // $redirectUrl = $request->query('redirect_url', route('admin.clientlist'));           //Domyślnie do 'clientlist'
        return view('admin.clientdata', compact('client', 'trips', 'selectedTripId', 'selectedDateId', 'dates', 'redirectUrl'));
    }

    /** Aktualizuje dane klienta.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *******************************************/

    public function update(ClientRequest $clientRequest, AddressRequest $addressRequest, $id)
    {
        // Znalezienie klienta po ID
        $client = Client::findOrFail($id);

        // Log::info('START LOGÓW. Dane w rubrykach:', $request->all());

        // Walidacja danych klienta  (bez adresu i city_name)
        $validatedClientData = $clientRequest->validated();

        // Aktualizacja danych klienta
        $client->update($validatedClientData);

        // Walidacja danych adresu
        $validatedAddressData = $addressRequest->validated();
        // Log::info(' Dane po walidacji:', $validatedClientData);

        // Znajdowanie lub tworzenie nowego miasta
        $city_name = City::firstOrCreate(['city_name' => $validatedAddressData['city_name']]);

        // Znajdowanie lub tworzenie nowego adresu
        $address = Address::firstOrCreate([
            'street' => $validatedAddressData['street'],
            'house_number' => $validatedAddressData['house_number'],
            'apartment_number' => $validatedAddressData['apartment_number'],
            'postal_code' => $validatedAddressData['postal_code'],
            'city_id' => $city_name->id,
        ]);

        // Przypisanie adresu do klienta
        $client->address()->associate($address);
        $client->save();

        // Aktualizacja citizenship
        $citizenship = Citizenship::findOrFail($validatedClientData['citizenship_id']);
        $client->citizenship()->associate($citizenship);

        // Zaktualizowanie pola stage
        // $client->stage = $validatedClientData['stage'];
        // Aktualizacja pola stage oddzielnie (inaczej)
        $client->stage = $validatedClientData['stage'];

        // Zapisanie wszystkich zmian
        $client->save();

        // Log wartości stage po aktualizacji
        // Log::info('Wartość stage po aktualizacji:', ['stage' => $client->fresh()->stage]);

        // Log danych z żądania z dodaniem separatora i pustej linii
        Log::info("\n\n----------------- START LOGÓW -----------------\n", [
            'client_data' => $validatedClientData,
            'address_data' => $validatedAddressData,
        ]);

        // Walidacja danych wejściowych z logowaniem
        $validatedTripData = $clientRequest->validated();
        Log::info("\Walidacja zakończona pomyślnie:", $validatedTripData);

        // Znalezienie klienta po ID
        // $client = Client::findOrFail($id);      //powtórzona instrukcja, usunąć?

        // Znalezienie istniejącego powiązania klienta z terminem
        $clientDate = ClientDate::where('client_id', $client->id)->firstOrFail();

        // Logowanie informacji przed aktualizacją z pustą linią
        Log::info("\Przed aktualizacją:", [
            'client_id' => $client->id,
            'current_date_id' => $clientDate->date_id,
            'current_trip_id' => Date::find($clientDate->date_id)->trip_id,
        ]);

        // Znalezienie odpowiedniego trip i date na podstawie zwalidowanych danych
        // Znalezienie wyprawy (Trip)
        $trip = Trip::find($validatedTripData['trip']);
        // Znalezienie daty (Date):
        $date = Date::where('id', $validatedTripData['start_date'])
                    ->where('trip_id', $trip->id)
                    ->firstOrFail();

        // Logowanie informacji o znalezionych danych
        Log::info("Znalezione dane:", [
            'trip_id' => $trip->id,
            'trip_name' => $trip->trip_name, // zakładając, że istnieje kolumna 'name'
            'date_id' => $date->id,
            'date_start' => $date->start_date, // zakładając, że istnieje kolumna 'start_date'
        ]);

        // Aktualizacja powiązania z nową datą i nowym trip_id
        ClientDate::where('client_id', $client->id)
        ->where('date_id', $clientDate->date_id)
            ->update([
                'date_id' => $date->id, // Aktualizacja date_id wystarczy
                // 'date_id' => $validatedTripData['start_date'],
                // 'trip_id' => $validatedTripData['trip'],
            ]);


        // Logowanie informacji po aktualizacji z pustą linią
        Log::info("\Po aktualizacji:", [
            'client_id' => $client->id,
            'updated_date_id' => $clientDate->date_id,
            'updated_trip_id' => $date->trip_id,
        ]);

        // Przekierowanie na odpowiednią stronę z komunikatem o sukcesie
        $redirectUrl = $clientRequest->input('redirect_url', route('admin.clientlist'));          // Domyślnie 'clientlist'
        return redirect($redirectUrl)->with('success', 'Dane klienta zostały zaktualizowane.');
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
        }
    }
}
