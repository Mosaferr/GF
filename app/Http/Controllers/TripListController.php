<?php
namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class TripListController extends Controller
{
    public function index(Request $request)
    {
        // Pobierz parametry sortowania z zapytania lub ustaw domyślne wartości
        $sortBy = $request->input('sort_by', 'id');         // Domyślna kolumna do sortowania
        $order = $request->input('order', 'asc');           // Domyślny kierunek sortowania

        if ($sortBy === 'trip.country') {                   // Sprawdzenie, czy sortujemy po kolumnie z tabeli trips
            $dates = Date::join('trips', 'dates.trip_id', '=', 'trips.id')
                ->select('dates.*')
                ->orderBy('trips.country', $order)
                // ->take(20)
                ->get();
        } else {
            $dates = Date::with('trip')                     // Pobierz wiersze z tabeli Dates wraz z powiązanymi danymi z tabeli Trips
                ->orderBy($sortBy, $order)
                // ->take(20)
                ->get();
        }

        // $dates = Date::with('trip')->take(20)->get();                    // Pobierz 20 pierwszych wierszy z tabeli Dates wraz z powiązanymi danymi z tabeli Trips
        return view('admin.triplist', ['dates' => $dates]);    // Przekaż dane do widoku
    }
}
