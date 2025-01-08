<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\User;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user(); // pobranie usera
        // Przekierowanie na wcześniej zamierzoną stronę lub na /service/available, jeśli nie ma takiej strony
        $client = \App\Models\Client::where('user_id', $user->id)->first();

        if ($client) {
            switch ($client->stage) {
                case 'zarezerwowany':
                    return redirect()->route('service.available');
                case 'zapisany':
                    return redirect()->route('service.payment');
                case 'przedpłacone':
                    return redirect()->route('service.payment2');
                case 'opłacone':
                    return redirect()->route('service.final');
            }
        }
        return redirect()->intended(route('service.available'));
        // return redirect()->intended(route('verify-email'));
        // return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
