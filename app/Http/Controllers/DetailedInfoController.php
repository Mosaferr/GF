<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Date;
use App\Models\Client;
use App\Models\Address;
use App\Models\Citizenship;
use App\Models\City;
use App\Models\ClientDate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class DetailedInfoController extends Controller
{
    public function show()
    {
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

    public function store(Request $request)
    {
        $user = Auth::user();                                       // Pobierz zalogowanego użytkownika
        $participants = $request->input('participants');            // Pobierz dane uczestników

        // Walidacja danych uczestników
        $rules = [
            'participants.*.name' => 'required|string|max:255',
            'participants.*.last_name' => 'required|string|max:255',
            'participants.*.birth_date' => 'required|date',
            'participants.*.phone' => 'nullable|string|max:15',
            'participants.*.email' => 'required|email',
            'participants.*.pesel' => 'required|string',
            'participants.*.citizenship' => 'required|string',
            // 'participants.*.gender' => 'required|string',
            'participants.*.passport_number' => 'required|string',
            'participants.*.passport_issue_date' => 'required|date',
            'participants.*.passport_expiry_date' => 'required|date|after:participants.*.passport_issue_date',
            'participants.*.street' => 'required|string',
            'participants.*.house_number' => 'required|string',
            'participants.*.apartment_number' => 'nullable|string',
            'participants.*.postal_code' => 'required|string',
            'participants.*.city_name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Log::error('Walidacja nie powiodła się.', ['errors' => $validator->errors()]);
            return back()->withErrors($validator)->withInput();
            // return response()->json(['errors' => $validator->errors()], 400);
        } else {

            // Zapisywanie danych uczestników do bazy danych
        foreach ($participants as $participantData) {

		$city = City::firstOrCreate(['city_name' => $participantData['city_name']]);    // Wyszukaj lub utwórz miasto na podstawie city_name

            $address = Address::create([
                'street' => $participantData['street'],
                'house_number' => $participantData['house_number'],
                'apartment_number' => $participantData['apartment_number'],
                'postal_code' => $participantData['postal_code'],
                'city_id' => $city->id,                                                 // Używamy city_id z utworzonego lub znalezionego miasta
            ]);

            $citizenship = Citizenship::firstOrCreate(['citizenship' => $participantData['citizenship']]);

            $client = Client::create([
                'user_id' => $user->id,
                'name' => $participantData['name'],
                'middle_name' => $participantData['middle_name'] ?? null,
                'last_name' => $participantData['last_name'],
                'email' => $participantData['email'],
                'birth_date' => $participantData['birth_date'],
                'phone' => $participantData['phone'],
                'pesel' => $participantData['pesel'],
                'citizenship_id' => $citizenship->id,
                'passport_number' => $participantData['passport_number'],
                'passport_issue_date' => $participantData['passport_issue_date'],
                'passport_expiry_date' => $participantData['passport_expiry_date'],
                'address_id' => $address->id,
            ]);

            $tripId = session('destination');
            $dateId = session('start_date');

            ClientDate::create([
                'client_id' => $client->id,
                'trip_id' => $tripId,
                'date_id' => $dateId,
            ]);
        }
        return redirect()->route('service.payment')->with('success', 'Dane zostały zapisane.');
        }
    }
}
