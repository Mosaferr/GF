<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Client;
use App\Models\Date;
use App\Models\UserDate;
use App\Mail\ReceiptMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Exception;

class ReceiptController extends Controller
{
    /*** Automatyczna wysyłka e-maila po rejestracji rezerwacji. */

    public function sendReceiptEmail($dateId)
    {
        Log::info("🔍 Wejście do sendReceiptEmail dla dateId: " . ($dateId ?? 'Brak dateId'));
        try {
            Log::info("🔍 Rozpoczęcie `sendReceiptEmail()` dla dateId: " . $dateId);

            // Pobranie zalogowanego użytkownika
            $user = Auth::user();
            Log::info("Użytkownik ID: " . ($user ? $user->id : 'Brak użytkownika'));

            // Pobranie lidera na podstawie user_id
            $leader = Client::where('user_id', $user->id)->orderBy('id')->firstOrFail();
            Log::info("✅ Znaleziono lidera: " . $leader->email . " (ID: " . $leader->id . ")");

            // Pobranie terminu wycieczki
            $date = Date::with('trip')->findOrFail($dateId);
            Log::info("✅ Znaleziono termin: " . $date->trip->trip_name . " (ID: " . $date->id . ")");

            Log::info("Lider ID: {$leader->id}, Sprawdzam uczestników dla leader_id: {$leader->id}");

            // Pobranie uczestników powiązanych z liderem
            $participants = Client::where('leader_id', $leader->leader_id)->get();
            Log::info("✅ Liczba uczestników: " . $participants->count());

            // Logowanie dla debugowania
            Log::info("Email dla lidera: {$leader->email}, ID lidera: {$leader->id}, dateId: {$dateId}");
            Log::info("Uczestnicy: " . json_encode($participants->pluck('id')));

            // Generowanie pliku PDF i kodowanie w Base64
            $pdfData = base64_encode($this->createPdf($leader, $date, $participants)->output());

            if (!$pdfData) {
                Log::error("❌ Błąd: Nie udało się wygenerować PDF.");
                return;
            }

            Log::info("✅ Plik PDF wygenerowany poprawnie.");

            // Wysłanie maila na adres lidera
            // Mail::to($leader->email)->send(new ReceiptMail($leader, $pdfData));
            Mail::to($leader->email)->send(new ReceiptMail($leader, $date->trip, $date, $pdfData));

            Log::info("✅ Wysłano e-mail z rachunkiem do: " . $leader->email);
        } catch (Exception $e) {
            Log::error("❌ Błąd wysyłki e-maila: " . $e->getMessage());
        }
    }

    /*** Pobranie PDF-a po kliknięciu przez użytkownika. */
    public function downloadReceiptPDF()
    {
        try {
            $user = Auth::user();

            // Pobranie poprawnego date_id z bazy danych
            $userDate = UserDate::where('user_id', $user->id)->first();
            $dateId = $userDate ? $userDate->date_id : null;

            if (!$dateId) {
                return response()->json(['error' => 'Brak powiązanego terminu w bazie danych.'], 500);
            }

            // Pobranie terminu wycieczki
            $date = Date::with('trip')->findOrFail($dateId);

            // Pobranie lidera i uczestników
            $leader = Client::where('user_id', $user->id)->orderBy('id')->firstOrFail();
            $participants = Client::where('leader_id', $leader->leader_id)->get();

            // Tworzenie PDF
            $pdf = $this->createPdf($leader, $date, $participants);
            return $pdf->download('rachunek.pdf');

        } catch (Exception $e) {
            Log::error("Błąd generowania PDF do pobrania: " . $e->getMessage());
            return response()->json(['error' => 'Nie udało się pobrać potwierdzenia.'], 500);
        }
    }

    /*** Generowanie pliku PDF. */
    private function createPdf($leader, $date, $participants)
    {
        $participantsCount = $participants->count();
        $totalPrice = $date->price * $participantsCount;

        return Pdf::loadView('service.receipt', [
            'client' => $leader,
            'trip' => $date->trip,
            'date' => $date,
            'participants' => $participants,
            'participantsCount' => $participantsCount,
            'totalPrice' => $totalPrice

        ])  ->setPaper('A4')
            ->setOption('defaultFont', 'Arial');
    }
}
