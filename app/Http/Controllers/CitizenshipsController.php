<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use Illuminate\Http\Request;

class CitizenshipsController extends Controller
{
    public function index()
    {
        return Citizenship::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['citizenship' => 'required|in:polskie,amerykańskie,brytyjskie,francuskie,niemieckie,ukraińskie,inne']);
        return Citizenship::create($validated);
    }

    public function show($id)
    {
        return Citizenship::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $citizenship = Citizenship::findOrFail($id);
        $validated = $request->validate(['citizenship' => 'required|in:polskie,amerykańskie,brytyjskie,francuskie,niemieckie,ukraińskie,inne']);
        $citizenship->update($validated);
        return $citizenship;
    }

    public function destroy($id)
    {
        $citizenship = Citizenship::findOrFail($id);
        $citizenship->delete();
        return response(null, 204);
    }
}
