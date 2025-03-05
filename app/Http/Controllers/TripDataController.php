<?php
namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;        //reguły walidacji
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
        return view('admin.tripdata', compact('trip', 'date', 'redirectUrl'));
    }

    /** Aktualizacja danych wucieczki.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *******************************************/
    public function update(TripRequest $request, $tripId, $dateId)
    {
        $date = Date::where('trip_id', $tripId)->where('id', $dateId)->firstOrFail();

        $validatedData = $request->validated();

        // Oblicz liczbę zajętych miejsc
        $occupiedSeats = $date->total_seats - $date->available_seats;
        // Sprawdź, czy total_seats >= liczba zajętych miejsc
        if ($validatedData['total_seats'] < $occupiedSeats) {
            return redirect()->back()->withErrors([
                'total_seats' => 'Liczba wszystkich dostepnych miejsc nie może być mniejsza niż liczba zajętych miejsc.',
            ]);
        }

        $seatDifference = $validatedData['total_seats'] - $date->total_seats;   // Oblicz różnicę przed update

        unset($validatedData['destination']);                                   // Usunięcie destination, bo nie istnieje w Date
        $date->update($validatedData);

        $newAvailableSeats = $date->available_seats + $seatDifference;          // aktualizacja available_seats
        $newAvailableSeats = max(0, min($validatedData['total_seats'], $newAvailableSeats));    //Ustawienie ograniczeń
        $date->update(['available_seats' => $newAvailableSeats]);   // Oddzielna aktualizacja tylko pola available_seats

        // Przekierowanie po sukcesie
        $redirectUrl = $request->input('redirect_url', route('admin.triplist'));
        return redirect($redirectUrl)->with('success', 'Dane wyprawy zostały zaktualizowane.');
    }

    /** Usuwanie wyprawy.
     *******************************************/
	public function destroy($tripId, $dateId, Request $request)
	{
		DB::beginTransaction();             // Rozpoczęcie transakcji
		try {
			// Znalezienie terminu wyprawy
			$date = Date::where('trip_id', $tripId)->where('id', $dateId)->firstOrFail();

			// Usunięcie terminu
			$date->delete();

			DB::commit();               // Zatwierdzenie transakcji

            // Przekierowanie po sukcesie
			$redirectUrl = $request->input('redirect_url', route('admin.triplist'));
			return redirect($redirectUrl)->with('success', 'Wyprawa została pomyślnie usunięta.');

		} catch (\Exception $e) {
			DB::rollBack();                 // Cofnięcie transakcji w przypadku błędu
			Log::error("Błąd podczas usuwania terminu wyprawy ID={$dateId} dla wyprawy ID={$tripId}: " . $e->getMessage());

			// Obsługa błędu
            $redirectUrl = $request->input('redirect_url', route('admin.triplist'));
            return redirect($redirectUrl)->with('error', 'Wystąpił problem podczas usuwania wyprawy.');
            }
	}
}
