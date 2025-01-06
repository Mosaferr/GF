<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        return City::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:cities|max:255']);
        return City::create($validated);
    }

    public function show($id)
    {
        return City::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $validated = $request->validate(['name' => 'required|unique:cities,name,'.$city->id.'|max:255']);
        $city->update($validated);
        return $city;
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return response(null, 204);
    }
}
