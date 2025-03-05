<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\UserDate;
use App\Http\Controllers\ReceiptController;

class PaymentSuccessController extends Controller
{
    public function handleSuccess()
    {
        $user = Auth::user();                   // Pobranie zalogowanego użytkownika
        if (!$user) {
            return redirect()->route('home')->with('error', 'Musisz być zalogowany, aby kontynuować.');
        }

        $leader = $user->clients->first();      // Pobranie lidera (głównego klienta)
        if (!$leader) {
            return redirect()->route('home')->with('error', 'Brak powiązanego klienta.');
        }

        // Jeśli użytkownik zapłacił tylko zaliczkę, przekierowujemy do Payment2Controller
        if ($leader->stage === 'przedpłacone') {
            return redirect()->route('service.payment2')->with('alert', 'Zaliczka zatwierdzona. Teraz dokonaj dopłaty.');
        }

        // Jeśli użytkownik zapłacił całość lub dopłacił do pełnej kwoty, sprawdzamy, czy rachunek został wysłany
        if ($leader->stage === 'opłacone') {

            if (!session()->has('receipt_sent')) {              // Sprawdzenie, czy mail nie został już wysłany
                // Pobranie `date_id` użytkownika
                $dateId = UserDate::where('user_id', $user->id)->latest()->value('date_id');

                if ($dateId) {
                    app(ReceiptController::class)->sendReceiptEmail($dateId);   // Wysłanie maila z rachunkiem
                    session(['receipt_sent' => true]);          // Ustawienie flagi w sesji, aby zapobiec ponownej wysyłce
                } else {
                    Log::error("Błąd: Nie znaleziono poprawnego dateId dla użytkownika.");
                }
            } else {
                Log::info("Email z rachunkiem został już wysłany, pomijam ponowną wysyłkę.");
            }

            return redirect()->route('service.final');      // Przekierowanie do FinalController
        }

        // Jeśli status jest inny niż 'przedpłacone' lub 'opłacone', coś poszło nie tak
        Log::error("Nieprawidłowy status płatności: {$leader->stage} dla user_id: {$user->id}");
        return redirect()->route('service.payment')->with('error', 'Nieprawidłowy etap płatności.');
    }
}
