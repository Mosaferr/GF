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
        return view('excursions.argentina');
    }

    public function indonesia()
    {
        return view('excursions.indonesia');
    }

    public function cambodia()
    {
        return view('excursions.cambodia');
    }

    public function peru()
    {
        return view('excursions.peru');
    }

    public function sri_lanka()
    {
        return view('excursions.sri_lanka');
    }

    public function tibet()
    {
        return view('excursions.tibet');
    }
}
