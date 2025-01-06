<?php

namespace App\Http\Controllers;

use App\Models\ClientDate;
use Illuminate\Http\Request;

class ClientsDatesController extends Controller
{
    public function index()
    {
        return ClientDate::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_id' => 'required|exists:dates,id',
        ]);
        return ClientDate::create($validated);
    }

    public function show($clientId, $dateId)
    {
        return ClientDate::where('client_id', $clientId)->where('date_id', $dateId)->firstOrFail();
    }

    public function update(Request $request, $clientId, $dateId)
    {
        $clientDate = ClientDate::where('client_id', $clientId)->where('date_id', $dateId)->firstOrFail();
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_id' => 'required|exists:dates,id',
        ]);
        $clientDate->update($validated);
        return $clientDate;
    }

    public function destroy($clientId, $dateId)
    {
        $clientDate = ClientDate::where('client_id', $clientId)->where('date_id', $dateId)->firstOrFail();
        $clientDate->delete();
        return response(null, 204);
    }
}
