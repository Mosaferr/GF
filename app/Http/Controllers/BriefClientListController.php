<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientListController extends Controller
{
    public function index(Request $request)
    {
        // Pobierz parametry sortowania z zapytania lub ustaw domyślne wartości
        $sortBy = $request->input('sort_by', 'clients.id'); // Domyślna kolumna do sortowania
        $order = $request->input('order', 'asc');           // Domyślny kierunek sortowania

        // Użycie złączeń (join), aby zawsze pobierać powiązane dane
        $clients = Client::join('users', 'clients.user_id', '=', 'users.id')
            ->join('users_dates', 'users.id', '=', 'users_dates.user_id')
            ->join('dates', 'users_dates.date_id', '=', 'dates.id')
            ->join('trips', 'dates.trip_id', '=', 'trips.id')
            ->select('clients.*', 'trips.country', 'dates.start_date', 'dates.end_date')
            ->orderBy($sortBy, $order)
            ->get();

        // Przekazanie danych do widoku
        return view('admin.clientlist', ['clients' => $clients]);
    }
}
