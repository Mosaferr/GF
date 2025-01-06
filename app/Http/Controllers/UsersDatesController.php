<?php

namespace App\Http\Controllers;

use App\Models\UserDate;
use Illuminate\Http\Request;

class UsersDatesController extends Controller
{
    public function index()
    {
        return UserDate::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date_id' => 'required|exists:dates,id',
        ]);
        return UserDate::create($validated);
    }

    public function show($userId, $dateId)
    {
        return UserDate::where('user_id', $userId)->where('date_id', $dateId)->firstOrFail();
    }

    public function update(Request $request, $userId, $dateId)
    {
        $userDate = UserDate::where('user_id', $userId)->where('date_id', $dateId)->firstOrFail();
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date_id' => 'required|exists:dates,id',
        ]);
        $userDate->update($validated);
        return $userDate;
    }

    public function destroy($userId, $dateId)
    {
        $userDate = UserDate::where('user_id', $userId)->where('date_id', $dateId)->firstOrFail();
        $userDate->delete();
        return response(null, 204);
    }
}
