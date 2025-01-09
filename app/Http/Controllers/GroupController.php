<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Date;
use Illuminate\Http\Request;

class GroupController extends Controller
{
	public function showGroup($trip_id, Request $request)
	{
		// Pobranie daty wyprawy i powiązanej wyprawy
		$trip = Date::with('trip')->findOrFail($trip_id);

		// Pobranie klientów powiązanych z datą wyprawy
		$sortBy = $request->input('sort_by', 'id');
		$order = $request->input('order', 'asc');

		$clients = $trip->clients()
			->with(['address.city'])
			->orderBy($sortBy, $order)
			->get();

		// Przekazanie danych do widoku
        $redirectUrl = url()->current();
        return view('admin.group', [
            'clients' => $clients,
            'trip' => $trip,
            'redirectUrl' => $redirectUrl,
        ]);
        // return view('admin.group', [
		// 	'clients' => $clients,
		// 	'trip' => $trip,
		// ]);
	}
}
