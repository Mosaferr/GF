<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index');
    }

    public function argentina()
    {
        return view('gallery.argentina');
    }

    public function bolivia()
    {
        return view('gallery.bolivia');
    }

    public function chile()
    {
        return view('gallery.chile');
    }

    public function china()
    {
        return view('gallery.china');
    }

    public function indonesia()
    {
        return view('gallery.indonesia');
    }

    public function cambodia()
    {
        return view('gallery.cambodia');
    }

    public function peru()
    {
        return view('gallery.peru');
    }

    public function sri_lanka()
    {
        return view('gallery.sri_lanka');
    }

    public function tibet()
    {
        return view('gallery.tibet');
    }
}
