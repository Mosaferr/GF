<?php
namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
// use App\Models\Client;
// use App\Models\User;
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
    /** Wyświetla formularz edycji dla wybranej wyprawy.
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     *******************************************/

    public function edit($tripId, $dateId, Request $request)
    {
        // Pobranie wyprawy i odpowiadającego jej terminu
        $trip = Trip::findOrFail($tripId);
        $date = Date::where('trip_id', $tripId)->where('id', $dateId)->firstOrFail();

        $redirectUrl = $request->input('redirect_url', route('admin.triplist'));
        // $redirectUrl = $request->query('redirect_url', route('admin.triplist'));   // Domyślny redirect do listy
        return view('admin.tripdata', compact('trip', 'date', 'redirectUrl'));
    }

    /** Aktualizacja danych wucieczki.
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
            // 'available_seats' => 'required|integer|min:0',
            'total_seats' => 'required|integer|min:0',
        ]);

        // Oblicz liczbę zajętych miejsc
        $occupiedSeats = $date->total_seats - $date->available_seats;
        // Sprawdź, czy total_seats >= liczba zajętych miejsc
        if ($validatedData['total_seats'] < $occupiedSeats) {
            return redirect()->back()->withErrors([
                'total_seats' => 'Liczba wszystkich dostepnych miejsc nie może być mniejsza niż liczba zajętych miejsc.',
            ]);
        }

        $seatDifference = $validatedData['total_seats'] - $date->total_seats; // Oblicz różnicę przed update
        $date->update($validatedData); // Dopiero teraz zaktualizuj dane

        // Odświeżenie obiektu $date, aby uzyskać zaktualizowane wartości
        // $date->refresh();

        // aktualizacja available_seats
        $newAvailableSeats = $date->available_seats + $seatDifference;
        //Ustawienie ograniczeń
        $newAvailableSeats = max(0, min($validatedData['total_seats'], $newAvailableSeats));
        // Oddzielna aktualizacja tylko pola available_seats
        $date->update(['available_seats' => $newAvailableSeats]);

        // Przekierowanie po sukcesie
        $redirectUrl = $request->input('redirect_url', route('admin.triplist'));
        return redirect($redirectUrl)->with('success', 'Dane wyprawy zostały zaktualizowane.');
    }


    /** Usuwanie wyprawy.
     *******************************************/
	public function destroy($tripId, $dateId, Request $request)
	{
		DB::beginTransaction(); // Rozpoczęcie transakcji
		try {
            // Logowanie początku operacji
            Log::info("\n\n------------ START LOGÓW ------------\n");

			// Znalezienie terminu wyprawy
			$date = Date::where('trip_id', $tripId)->where('id', $dateId)->firstOrFail();

			// Usunięcie terminu
			$date->delete();

			DB::commit(); // Zatwierdzenie transakcji

			Log::info("Usunięto termin wyprawy ID={$dateId} dla wyprawy ID={$tripId}");
            Log::info("\n----------------- KONIEC LOGÓW -----------------\n\n");

			// Przekierowanie po sukcesie
			$redirectUrl = $request->input('redirect_url', route('admin.triplist'));
			return redirect($redirectUrl)->with('success', 'Wyprawa została pomyślnie usunięta.');

		} catch (\Exception $e) {
			DB::rollBack(); // Cofnięcie transakcji w przypadku błędu

			Log::error("Błąd podczas usuwania terminu wyprawy ID={$dateId} dla wyprawy ID={$tripId}: " . $e->getMessage());

			// Obsługa błędu
            $redirectUrl = $request->input('redirect_url', route('admin.triplist'));
            return redirect($redirectUrl)->with('error', 'Wystąpił problem podczas usuwania wyprawy.');
            }
	}
}
