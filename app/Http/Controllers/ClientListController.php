<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientListController extends Controller
{
    public function index(Request $request)
    {
        // Pobierz parametry sortowania
        $sortBy = $request->input('sort_by', 'id');       // Domyślna kolumna do sortowania
        $order = $request->input('order', 'asc');         // Domyślny kierunek sortowania

    // Pobierz dane z bazy SQL lub sortuj w pamięci
    if (in_array($sortBy, ['city_name', 'country', 'start_date'])) {
        // Pobranie wszystkich danych z relacjami
        $clients = Client::with(['dates.trip', 'address.city', 'citizenship'])->get();

        // Sortowanie w pamięci
        $clients = $clients->sortBy(function ($client) use ($sortBy) {
            if ($sortBy === 'city_name') {
                return $client->address->city->city_name ?? '';
            } elseif ($sortBy === 'country') {
                return $client->dates->first()->trip->country ?? '';
            } elseif ($sortBy === 'start_date') {
                return $client->dates->first()->start_date ?? '';
            }
        }, SORT_REGULAR, $order === 'desc');
    } else {
        // Sortowanie SQL dla prostych kolumn
        $clients = Client::with(['dates.trip', 'address.city', 'citizenship'])
            ->orderBy($sortBy, $order)
            ->get();
    }
        // Przekazanie danych do widoku
        return view('admin.clientlist', ['clients' => $clients]);
    }
}
