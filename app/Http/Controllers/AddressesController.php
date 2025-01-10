<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'street' => 'required|max:255',
            'house_number' => 'required|max:50',
            'apartment_number' => 'nullable|max:50',
            'postal_code' => 'required|max:20',
            'city_id' => 'required|exists:cities,id',
        ]);
        return Address::create($validated);
    }

    public function show($id)
    {
        return Address::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $validated = $request->validate([
            'street' => 'required|max:255',
            'house_number' => 'required|max:50',
            'apartment_number' => 'nullable|max:50',
            'postal_code' => 'required|max:20',
            'city_id' => 'required|exists:cities,id',
        ]);
        $address->update($validated);
        return $address;
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return response(null, 204);
    }
}
