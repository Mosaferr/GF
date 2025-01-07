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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:male,female,M,F,Kobieta,Mężczyzna',
            'phone' => 'nullable|string|max:20',
            'pesel' => 'required|string|max:11',
            'citizenship' => 'required|string|in:polskie,amerykańskie,brytyjskie,francuskie,niemieckie,ukraińskie,inne',
            'passport_number' => 'required|string|max:20',
            'passport_issue_date' => 'required|date',
            'passport_expiry_date' => 'required|date|after:passport_issue_date',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'apartment_number' => 'nullable|string|max:10',
            'postal_code' => 'required|string|max:10',
            'city_name' => 'required|string|max:255',
        ], [
            'citizenship.required' => 'Obywatelstwo musi być wybrane.',
            'passport_expiry_date.after' => 'Data ważności paszportu musi być późniejsza niż data wydania.',
        ]);

        $city = City::firstOrCreate(['city_name' => $request->input('city_name')]);

        $citizenship = Citizenship::where('citizenship', $request->input('citizenship'))->first();
        if (!$citizenship) {
            throw new \Exception('No citizenship found');
        }

        $address = Address::create([
            'street' => $request->input('street'),
            'house_number' => $request->input('house_number'),
            'apartment_number' => $request->input('apartment_number'),
            'postal_code' => $request->input('postal_code'),
            'city_id' => $city->id,
        ]);

        $genderValue = $request->input('gender');
        if ($genderValue == 'Kobieta' || $genderValue == 'female') {
            $genderValue = 'F';
        } elseif ($genderValue == 'Mężczyzna' || $genderValue == 'male') {
            $genderValue = 'M';
        }

        $client = Client::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $genderValue,
            'phone' => $request->input('phone'),
            'pesel' => $request->input('pesel'),
            'citizenship_id' => $citizenship->id,
            'passport_number' => $request->input('passport_number'),
            'passport_issue_date' => $request->input('passport_issue_date'),
            'passport_expiry_date' => $request->input('passport_expiry_date'),
            'address_id' => $address->id,
        ]);

        $tripId = session('destination');
        $dateId = session('start_date');

        ClientDate::create([
            'client_id' => $client->id,
            'trip_id' => $tripId,
            'date_id' => $dateId,
        ]);

        return redirect()->route('service.payment')->with('success', 'Dane zostały zapisane.');
    }
}
