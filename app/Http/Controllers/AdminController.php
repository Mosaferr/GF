<?php
namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $dates = Date::with('trip')
            ->orderBy('start_date', 'asc')  // Sortowanie według daty rozpoczęcia, rosnąco
            ->take(5)                                   // Pobiera pierwsze 5 wycieczek
            ->get();

        return view('admin.admin', ['dates' => $dates]);
    }
}
