<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class DatesController extends Controller
{
    public function index()
    {
        // Pobierz 11 pierwszych wierszy z tabeli Dates wraz z powiązanymi danymi z tabeli Trips
        $dates = Date::with('trip')->take(11)->get();

        // Przekaż dane do widoku
        return view('terms', ['dates' => $dates]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'available_seats' => 'required|integer|min:0',
        ]);
        return Date::create($validated);
    }

    public function show($id)
    {
        return Date::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $date = Date::findOrFail($id);
        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'available_seats' => 'required|integer|min:0',
        ]);
        $date->update($validated);
        return $date;
    }

    public function destroy($id)
    {
        $date = Date::findOrFail($id);
        $date->delete();
        return response(null, 204);
    }

    //nowe, do obsługi formularza rejestracji
    public function getDatesByTripId($trip_id)
    {
        $dates = Date::where('trip_id', $trip_id)->get();
        return response()->json($dates);
    }
}
