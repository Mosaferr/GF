<?php
namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
use App\Http\Requests\TripRequest;        //reguły walidacji

class AddTripController extends Controller
{
    /**
     * Wyświetlanie formularza dodawania wyprawy.
     */
    public function create()
    {
        $trips = Trip::all(); // Pobranie wszystkich destynacji
        return view('admin.addtrip', compact('trips')); // Przekazanie destynacji do widoku
    }

    /**
     * Zapisanie nowej wyprawy.
     */
    public function store(TripRequest $request)
    {
        $validated = $request->validated();         // Walidacja danych - można usunąć, bo nie jest wykorzystywana

        $trip = Trip::findOrFail($request->destination);

        Date::create([
            'trip_id' => $trip->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'total_seats' => $request->total_seats,
            'available_seats' => $request->total_seats,
        ]);

        $redirectUrl = $request->input('redirect_url', route('admin.triplist'));
        return redirect($redirectUrl)->with('success', 'Nowa wyprawa została dodana.');
    }
}
