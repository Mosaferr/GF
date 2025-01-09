<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Date;
use App\Models\Client;
// use App\Models\Citizenship;
// use App\Models\Address;
// use App\Models\City;

class FindClientController extends Controller
{
    /**
     * Wyświetlanie listy i formularza wyszukiwania klienta.
     */
    public function index(Request $request)
    {
        $clients = Client::with(['dates.trip', 'address.city']);    // Pobranie danych klienta

        // Dodanie filtrów na podstawie wprowadzonych danych
        if ($request->filled('name')) {
        $clients->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->filled('last_name')) {
        $clients->where('last_name', 'like', '%' . $request->input('last_name') . '%');
        }
        if ($request->filled('age_from')) {
        $clients->whereDate('birth_date', '<=', now()->subYears($request->input('age_from')));
        }
        if ($request->filled('age_to')) {
        $clients->whereDate('birth_date', '>=', now()->subYears($request->input('age_to')));
        }
        if ($request->filled('phone')) {
            $clients->where('phone', 'like', '%' . $request->input('phone') . '%');
        }
        if ($request->filled('email')) {
            $clients->where('email', 'like', '%' . $request->input('email') . '%');
        }
        if ($request->filled('expiry_date')) {
        $clients->whereDate('expiry_date', '<=', $request->input('expiry_date'));
        }
        if ($request->filled('invalid_passport_from')) {
        $clients->whereDate('expiry_date', '>=', $request->input('invalid_passport_from'));
        }
        if ($request->filled('postal_code')) {
        $clients->whereHas('address', function ($query) use ($request) {
            $query->where('postal_code', 'like', '%' . $request->input('postal_code') . '%');
        });
        }
        if ($request->filled('city_name')) {
            $clients->whereHas('address.city', function ($query) use ($request) {
                $query->where('city_name', 'like', '%' . $request->input('city_name') . '%');
            });
        }
        if ($request->filled('citizenship_id')) {
            $clients->where('citizenship_id', $request->input('citizenship_id'));
        }
        if ($request->filled('trip')) {
        $clients->whereHas('dates.trip', function ($query) use ($request) {
            $query->where('id', $request->input('trip'));
        });
        }
        if ($request->filled('start_date')) {
        $clients->whereHas('dates', function ($query) use ($request) {
            $query->where('id', $request->input('start_date'));
        });
        }
        if ($request->filled('stage')) {
        $clients->where('stage', $request->input('stage'));
        }

        $clients = $clients->get();

        // Przekazanie zmiennych i wyświetlenie widoku z listą klientów i formularzem
        return view('admin.findclient', [
            'trips' => Trip::all(),
            'dates' => Date::all(),
            'clients' => $clients,
            'redirect_url' => $request->input('redirect_url', route('admin.clientlist')), // Domyślnie powrót do listy klientów
        ]);    }
}
