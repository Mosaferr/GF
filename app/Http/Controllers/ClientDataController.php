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
use App\Models\UserDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;    // reguły walidacji
use App\Http\Requests\AddressRequest;   // reguły walidacji

class ClientDataController extends Controller
{
    /** Wyświetla formularz edycji dla wybranego klienta.
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     *******************************************/
    public function edit($id, Request $request)
    {

        $client = Client::with(['dates.trip'])->findOrFail($id);     // Pobranie klienta wraz z powiązanymi datami i wycieczkami przez clientsDates
        $trips = Trip::all();                                                       // Pobranie listy wszystkich dostępnych destynacji
        $selectedTripId = $client->dates->first()->trip->id;                        // Pobranie domyślnej destynacji z bazy danych
        $selectedDateId = $client->dates->first()->id;                              // Pobranie terminu z bazy danych
        $dates = Date::where('trip_id', $selectedTripId)->get();    // Pobranie wszystkich terminów dla wybranej destynacji

        // Przekazanie danych do widoku
        $redirectUrl = $request->input('redirect_url', route('admin.clientlist'));      //Domyślnie do 'clientlist'
        return view('admin.clientdata', compact('client', 'trips', 'selectedTripId', 'selectedDateId', 'dates', 'redirectUrl'));
    }

    /** Aktualizuje dane klienta.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *******************************************/
    public function update(ClientRequest $clientRequest, AddressRequest $addressRequest, $id)
    {
        $client = Client::findOrFail($id);                  // Znalezienie klienta po ID
        $validatedClientData = $clientRequest->validated();     // Walidacja danych klienta  (bez adresu i city_name)
        $client->update($validatedClientData);      // Aktualizacja danych klienta
        $validatedAddressData = $addressRequest->validated();   // Walidacja danych adresu

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
        $client->stage = $validatedClientData['stage'];

        // Zapisanie wszystkich zmian
        $client->save();

        // Walidacja danych wejściowych z logowaniem
        $validatedTripData = $clientRequest->validated();

        // Znalezienie istniejącego powiązania klienta z terminem
        $clientDate = ClientDate::where('client_id', $client->id)->firstOrFail();

        // Logowanie informacji przed aktualizacją z pustą linią
        Log::info("\Przed aktualizacją:", [
            'client_id' => $client->id,
            'current_date_id' => $clientDate->date_id,
            'current_trip_id' => Date::find($clientDate->date_id)->trip_id,
        ]);

        // Znalezienie odpowiedniego trip i date na podstawie zwalidowanych danych
        $trip = Trip::find($validatedTripData['trip']);                                 // Znalezienie wyprawy (Trip)
        $date = Date::where('id', $validatedTripData['start_date'])       // Znalezienie daty (Date)
                    ->where('trip_id', $trip->id)
                    ->firstOrFail();

        // Aktualizacja powiązania z nową datą i nowym trip_id
        ClientDate::where('client_id', $client->id)
        ->where('date_id', $clientDate->date_id)
            ->update([
                'date_id' => $date->id,                                                     // Aktualizacja date_id
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
            // 1. Znalezienie klienta  po ID
            $client = Client::findOrFail($id);

            // Zwiększenie liczby miejsc o 1
            $dateId = $client->dates()->first()->id;        // Pobranie ID daty powiązanej z klientem
            Date::where('id', $dateId)->increment('available_seats', 1);

            // *****  Jeśli klient został dodany przez administratora
            if ($client->user_id == 1) {
                $client->dates()->detach();                 // Usunięcie powiązań klienta z datami

                $address = $client->address;                // Usunięcie adresu, jeśli klient jest ostatnim, który go używa
                if ($address && $address->clients()->count() <= 1) {
                    $address->delete();
                    Log::info("Adres klienta ID: {$client->id} został usunięty.");
                }

                $city = $address ? $address->city : null;               // Usunięcie miasta, jeśli klient jest ostatnim, który go używa
                if ($city && $city->addresses()->count() <= 1) {        // Sprawdź, czy miasto istnieje i czy jest ostatnim używanym
                    $city->delete();
                }

                $client->delete();                          // Usunięcie klienta

                DB::commit();

                // Przekierowanie na odpowiednią stronę
                $redirectUrl = $request->input('redirect_url', route('admin.clientlist'));
                return redirect($redirectUrl)->with('success', 'Klient został usunięty.');
            }
            // *****  Koniec "Jeśli klient został dodany przez administratora"

            // Przechowanie wartości w tymczasowych zmiennych
            $leaderId = $client->leader_id;		            // przechowanie leader_id klienta w zmiennej
            $clientId = $client->id;			            // przechowanie ID klienta
            $clientleaderId = Client::where('leader_id', $leaderId)
                                    ->orderBy('id')
                                    ->first()->id;  	    // przechowanie ID klienta, który jest liderem
            $userId = $client->user_id;     	            // Powiązanie z user_id (możliwe ID lidera) - DO USUNIĘCIA.

            // 2. Usunięcie powiązań klienta z datami
            $client->dates()->detach();

            // 3. Usunięcie adresu, jeśli klient jest ostatnim, który go używa
            $address = $client->address;
            if ($address && $address->clients()->count() <= 1) {    // Usunięcie adresu jeśli jest przypisany tylko do tego klienta
                $address->delete();
            }

            // Usunięcie miasta, jeśli klient jest ostatnim, który go używa
            $city = $address ? $address->city : null;
            if ($city && $city->addresses()->count() <= 1) {        // Sprawdź, czy miasto istnieje i czy jest ostatnim używanym
                $city->delete();
            }

            // 4. Ustawienie leader_id i user_id na null dla klientów w grupie lidera
            if ($leaderId) {
                Client::where('leader_id', $leaderId)->update(['leader_id' => null]);
            }

            // 5. Usunięcie klienta z tabeli clients
            $client->delete();

            // 6. Zmniejszenie liczby uczestników (participants) dla lidera
            if ($leaderId) {
                User::where('id', $leaderId)->decrement('participants');
                // Pobranie aktualnej liczby participants
                $currentParticipants = User::where('id', $leaderId)->value('participants');
            }
            if ($currentParticipants > 0) {
            // 7. Przywrócenie leader_id dla pozostałych klientów, jeśli lider pozostaje
                Client::whereNull('leader_id')->update([
                    'leader_id' => $leaderId,
                ]);
            } else {
            // 8. Usunięcie lidera z tabel users i users_dates, jeśli `participants` wynosi 0
                User::where('id', $leaderId)->delete();
                // Usunięcie lidera z users_dates
                DB::table('users_dates')->where('user_id', $leaderId)->delete();	// Query Builder - to samo co niżej
                // UserDate::where('user_id', $leaderId)->delete();					// Eloquent - to samo co wyżej (choć nie wiem czy do końca)
            }

            DB::commit(); // Zatwierdzenie transakcji

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
