<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientListController extends Controller
{
    public function index(Request $request)
    {
        // Pobierz parametry sortowania z zapytania lub ustaw domyślne wartości
        $sortBy = $request->input('sort_by', 'clients.id');     // Domyślna kolumna do sortowania
        $order = $request->input('order', 'asc');               // Domyślny kierunek sortowania

        // Użycie złączeń (join), aby zawsze pobierać powiązane dane
        $clients = Client::join('clients_dates', 'clients.id', '=', 'clients_dates.client_id')
            ->join('dates', 'clients_dates.date_id', '=', 'dates.id')
            ->join('trips', 'dates.trip_id', '=', 'trips.id')
            ->join('addresses', 'clients.address_id', '=', 'addresses.id')
            ->join('cities', 'addresses.city_id', '=', 'cities.id')
            ->join('citizenships', 'clients.citizenship_id', '=', 'citizenships.id')
            ->select('clients.*', 'trips.country', 'dates.start_date', 'dates.end_date', 'cities.city_name', 'citizenships.citizenship')
            ->orderBy($sortBy, $order)
            ->get();

        return view('admin.clientlist', ['clients' => $clients]);        // Przekazanie danych do widoku
    }
}
