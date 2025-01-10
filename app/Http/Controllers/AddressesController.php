<?php
namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\AddressRequest;    // reguły walidacji

class AddressesController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(AddressRequest $request)
    {
        $validated = $request->validated();
        return Address::create($validated);
    }

    public function show($id)
    {
        return Address::findOrFail($id);
    }

    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);
        $validated = $request->validated();
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
