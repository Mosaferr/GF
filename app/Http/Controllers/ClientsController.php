<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'birth_date' => 'required|date',
            // 'gender' => 'required|in:M,F',
            'stage' => 'required|in:zarezerwowany, zapisany, przedpłacone, opłacone',
            'phone' => 'nullable|max:20',
            'email' => 'required|email',
            'pesel' => 'required|max:20',
            'citizenship_id' => 'required|exists:citizenships,id',
            'passport_number' => 'required|max:50',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'address_id' => 'required|exists:addresses,id',
            'leader_id' => 'nullable|exists:clients,id',
        ]);
        return Client::create($validated);
    }

    public function show($id)
    {
        return Client::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'birth_date' => 'required|date',
            // 'gender' => 'required|in:M,F',
            'stage' => 'required|in:zarezerwowany, zapisany, przedpłacone, opłacone',
            'phone' => 'nullable|max:20',
            'email' => 'required|email',
            'pesel' => 'required|max:20',
            'citizenship_id' => 'required|exists:citizenships,id',
            'passport_number' => 'required|max:50',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'address_id' => 'required|exists:addresses,id',
            'leader_id' => 'nullable|exists:clients,id',
        ]);

        $client->update($validated);
        return $client;
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response(null, 204);
    }
}
