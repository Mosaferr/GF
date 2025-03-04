<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\UserDate;
use App\Models\Client;
use App\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;

class PaymentSuccessController extends Controller
{
    public function handleSuccess()
    {
        Log::info("🔍 WEJŚCIE do PaymentSuccessController::handleSuccess()");

        $user = Auth::user(); // Pobranie zalogowanego użytkownika

        if (!$user) {
            return redirect()->route('home')->with('error', 'Musisz być zalogowany, aby kontynuować.');
        }

        // Pobranie lidera (głównego klienta)
        $leader = $user->clients->first();

        if (!$leader) {
            Log::error("❌ Brak powiązanego klienta dla user_id: {$user->id}");
            return redirect()->route('home')->with('error', 'Brak powiązanego klienta.');
        }

        Log::info("🔍 Sprawdzam status płatności: {$leader->stage}");

        // 1️⃣ Jeśli użytkownik zapłacił tylko zaliczkę, przekierowujemy do Payment2Controller
        if ($leader->stage === 'przedpłacone') {
            return redirect()->route('service.payment2')->with('alert', 'Zaliczka zatwierdzona. Teraz dokonaj dopłaty.');
        }

        // 2️⃣ Jeśli użytkownik zapłacił całość lub dopłacił do pełnej kwoty, sprawdzamy, czy rachunek został wysłany
        if ($leader->stage === 'opłacone') {
            Log::info("🔍 Sprawdzam sesję: receipt_sent = " . (session('receipt_sent') ? 'TRUE' : 'FALSE'));

        // Sprawdzenie, czy mail nie został już wysłany
            if (!session()->has('receipt_sent')) {
                // Pobranie `date_id` użytkownika
                $dateId = UserDate::where('user_id', $user->id)->latest()->value('date_id');

                if ($dateId) {
                    Log::info("🔍 PRZED wywołaniem sendReceiptEmail dla dateId: {$dateId}");
                    // Wysłanie maila z rachunkiem
                    app(ReceiptController::class)->sendReceiptEmail($dateId);
                    Log::info("✅ PO wywołaniu sendReceiptEmail dla dateId: {$dateId}");

                    // Ustawienie flagi w sesji, aby zapobiec ponownej wysyłce
                    session(['receipt_sent' => true]);
                } else {
                    Log::error("❌ Błąd: Nie znaleziono poprawnego dateId dla użytkownika.");
                }
            } else {
                Log::info("✅ Email z rachunkiem został już wysłany, pomijam ponowną wysyłkę.");
            }

            // Przekierowanie do FinalController
            return redirect()->route('service.final');
        }

        // Jeśli status jest inny niż 'przedpłacone' lub 'opłacone', coś poszło nie tak
        Log::error("❌ Nieprawidłowy status płatności: {$leader->stage} dla user_id: {$user->id}");
        return redirect()->route('service.payment')->with('error', 'Nieprawidłowy etap płatności.');
    }
}
