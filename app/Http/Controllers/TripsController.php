<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function index()
    {
        return Trip::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|in:Argentyna i Chile,Indonezja,Kambodża,Peru i Boliwia,Sri Lanka,Tybet, w Chinach',
            'flag' => 'nullable|max:255',
            'trip_name' => 'required|in:W tango pod Andami,W świecie kontrastów,Królestwo w dżungli,W krainie kultu Słońca,Budda, herbata i słonie,Na Dachu Świata',
            'country' => 'required|in:Argentyna, Chile,Indonezja,Kambodża,Peru, Boliwia,Sri Lanka,Tybet, Chiny',
        ]);
        return Trip::create($validated);
    }

    public function show($id)
    {
        return Trip::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $validated = $request->validate([
            'destination' => 'required|in:Argentyna i Chile,Indonezja,Kambodża,Peru i Boliwia,Sri Lanka,Tybet, w Chinach',
            'flag' => 'nullable|max:255',
            'trip_name' => 'required|in:W tango pod Andami,W świecie kontrastów,Królestwo w dżungli,W krainie kultu Słońca,Budda, herbata i słonie,Na Dachu Świata',
            'country' => 'required|in:Argentyna, Chile,Indonezja,Kambodża,Peru, Boliwia,Sri Lanka,Tybet, Chiny',
        ]);
        $trip->update($validated);
        return $trip;
    }

    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();
        return response(null, 204);
    }
}
