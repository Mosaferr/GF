<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcursionsController extends Controller
{
    public function index()
    {
        return view('excursions.index');
    }

    public function argentina()
    {
        $dates = \App\Models\Date::where('trip_id', 1)->take(3)->get();
        return view('excursions.argentina', compact('dates'));
    }

    public function indonesia()
    {
        $dates = \App\Models\Date::where('trip_id', 2)->take(3)->get();
        return view('excursions.indonesia', compact('dates'));
    }

    public function cambodia()
    {
        $dates = \App\Models\Date::where('trip_id', 3)->take(3)->get();
        return view('excursions.cambodia', compact('dates'));
    }

    public function peru()
    {
        $dates = \App\Models\Date::where('trip_id', 4)->take(3)->get();
        return view('excursions.peru', compact('dates'));
    }

    public function sri_lanka()
    {
        $dates = \App\Models\Date::where('trip_id', 5)->take(3)->get();
        return view('excursions.sri_lanka', compact('dates'));
    }

    public function tibet()
    {
        $dates = \App\Models\Date::where('trip_id', 6)->take(3)->get();
        return view('excursions.tibet', compact('dates'));
    }
}
