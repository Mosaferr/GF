<?php
namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
use Illuminate\Http\Request;

class FindTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $dates = Date::with('trip');

        // Filtry
        if ($request->filled('destination')) {
            $dates->whereHas('trip', function ($q) use ($request) {
                $q->where('id', $request->input('destination'));
            });
        }
        if ($request->filled('start_date')) {
            $dates->where('start_date', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $dates->where('end_date', '<=', $request->input('end_date'));
        }
        if ($request->filled('price_min')) {
            $dates->where('price', '>=', $request->input('price_min'));
        }
        if ($request->filled('price_max')) {
            $dates->where('price', '<=', $request->input('price_max'));
        }
        if ($request->filled('total_seats')) {
            $dates->where('total_seats', '=', $request->input('total_seats'));
        }
        if ($request->filled('available_seats')) {
        $dates->where('available_seats', '>=', $request->input('available_seats'));
        }

        // Pobieranie wyników
        $dates = $dates->orderBy('start_date', 'asc')->get();

    // Przekazanie redirect_url
    return view('admin.findtrip', [
        'dates' => $dates,
        'trips' => Trip::all(),
        'redirect_url' => $request->input('redirect_url', route('admin.triplist')), // Domyślnie powrót do listy wypraw
    ]);
    }
}
