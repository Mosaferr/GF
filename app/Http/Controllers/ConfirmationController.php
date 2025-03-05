<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Client;
use App\Models\Date;
use App\Models\UserDate;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Exception;

class ConfirmationController extends Controller
{
    /*** Automatyczna wysyłka e-maila po rejestracji rezerwacji. */
    public function sendConfirmationEmail($dateId)
    {
        try {
            // Pobranie zalogowanego użytkownika
            $user = Auth::user();

            // Pobranie lidera na podstawie user_id
            $leader = Client::where('user_id', $user->id)->orderBy('id')->firstOrFail();
            // Pobranie terminu wycieczki
            $date = Date::with('trip')->findOrFail($dateId);
            // Pobranie uczestników powiązanych z liderem
            $participants = Client::where('leader_id', $leader->leader_id)->get();

            // Generowanie pliku PDF i kodowanie w Base64
            $pdfData = base64_encode($this->createPdf($leader, $date, $participants)->output());

            if (!$pdfData) {
                throw new Exception("Nie udało się wygenerować PDF.");
            }

            // Wysłanie maila na adres lidera
            Mail::to($leader->email)->send(new ConfirmationMail($leader, $date->trip, $date, $pdfData));

        } catch (Exception $e) {
            Log::error("Błąd wysyłki e-maila: " . $e->getMessage());
        }
    }

    /*** Pobranie PDF-a po kliknięciu przez użytkownika. */
    public function downloadPDF()
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
            return $pdf->download('potwierdzenie.pdf');

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

        return Pdf::loadView('service.confirmation', [
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
