<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use App\Models\Date;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DetailedInfoController extends Controller
{
    public function show()
    {
        // Pobieranie danych z sesji
        $tripId = session('destination');
        $dateId = session('start_date');

        $trip = Trip::find($tripId);
        $date = Date::find($dateId);

        $data = [
            'destination' => $trip ? $trip->name : null,
            'start_date' => $date ? Carbon::parse($date->start_date)->format('d.m') . ' - ' . Carbon::parse($date->end_date)->format('d.m.Y') : null,
            'name' => session('name'),
            'last_name' => session('last_name'),
            'phone' => session('phone'),
            'email' => session('email'),
        ];

        return view('service.detailed_info', $data);
    }

    public function submitDetails(Request $request)
    {
        $request->validate([
            'trip_name' => 'required|string|max:255',
            'trip_date' => 'required|date',
            'description' => 'required|string',
            'participants' => 'required|integer',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'pesel' => 'required|string|max:11',
            'citizenship_id' => 'required|integer',
            'passport_number' => 'required|string|max:20',
            'passport_issue_date' => 'required|date',
            'passport_expiry_date' => 'required|date',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'apartment_number' => 'nullable|string|max:10',
            'postal_code' => 'required|string|max:10',
            'city_id' => 'required|integer',
        ]);

        // Zapis danych do bazy lub inna logika
        // ...

        return redirect()->route('success');
    }
}
