<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
// use App\Models\User;
// use App\Http\Middleware\Manager;
// use App\Http\Middleware\Admin;
// use App\Http\Middleware\Normal;

class AuthenticatedSessionController extends Controller
{
    /** Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /** Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user(); // Pobranie użytkownika

        // Przekierowanie na podstawie roli użytkownika
        if ($user->role == 3) {
            return redirect()->route('admin');
        } elseif ($user->role == 2) {
            return redirect()->route('manager');
        } elseif ($user->role == 1) {

            // Kontynuacja logiki dla normalnych użytkowników
            // Przekierowanie na wcześniej zamierzoną stronę lub
            // na /service/available, jeśli nie ma takiej strony
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
        }

        // W razie, gdyby rola była inna lub nieznana
        return redirect()->route('dashboard');
    }

    /** Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
