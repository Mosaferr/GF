<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Client;
use App\Models\Date;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;

class ConfirmationController extends Controller
{
    /*** Automatyczna wysyłka e-maila po rejestracji rezerwacji. */
    public function sendConfirmationEmail($clientId, $dateId)
    {
        try {
            // Pobranie klienta
            $client = Client::with(['address.city', 'citizenship'])->findOrFail($clientId);
            if (!$client) {
                throw new Exception("Nie znaleziono klienta o ID: $clientId");
            }

            // Pobranie lidera
            $leader = $client->leader_id ? Client::findOrFail($client->leader_id) : $client;
            if (!$leader) {
                throw new Exception("Nie znaleziono lidera dla klienta ID: $clientId");
            }

            // Pobranie terminu wycieczki
            $date = Date::with('trip')->findOrFail($dateId);
            if (!$date) {
                throw new Exception("Nie znaleziono terminu wycieczki o ID: $dateId");
            }

            // Pobranie uczestników powiązanych z liderem
            $participants = Client::where('leader_id', $leader->id)->get();

            Log::info("Wysyłanie e-maila dla: " . $leader->email);

            // Generowanie pliku PDF i kodowanie w Base64
            $pdfData = base64_encode($this->createPdf($leader, $date, $participants)->output());

            if (!$pdfData) {
                throw new Exception("Nie udało się wygenerować PDF.");
            }

            // Wysłanie maila na adres lidera
            Mail::to($leader->email)->send(new ConfirmationMail($leader, $pdfData));
            // Mail::to($leader->email)->queue(new ConfirmationMail($leader, $pdfData));  asynchronicznie (kolejka)

            Log::info("Wysłano e-mail z potwierdzeniem do: " . $leader->email);
        } catch (Exception $e) {
            Log::error("Błąd wysyłki e-maila: " . $e->getMessage());
        }
    }

    /*** Pobranie PDF-a po kliknięciu przez użytkownika. */
    public function downloadPDF($clientId, $dateId)
    {
        try {
            // Pobranie klienta
            $client = Client::with(['address.city', 'citizenship'])->findOrFail($clientId);
            if (!$client) {
                throw new Exception("Nie znaleziono klienta o ID: $clientId");
            }

            // Pobranie lidera
            $leader = $client->leader_id ? Client::findOrFail($client->leader_id) : $client;
            if (!$leader) {
                throw new Exception("Nie znaleziono lidera dla klienta ID: $clientId");
            }

            // Pobranie terminu wycieczki
            $date = Date::with('trip')->findOrFail($dateId);
            if (!$date) {
                throw new Exception("Nie znaleziono terminu wycieczki o ID: $dateId");
            }

            // Pobranie uczestników powiązanych z liderem
            $participants = Client::where('leader_id', $leader->id)->get();

            $pdf = $this->createPdf($leader, $date, $participants);

            return $pdf->download('potwierdzenie.pdf');
        } catch (Exception $e) {
            Log::error("Błąd generowania PDF do pobrania: " . $e->getMessage());
            return response()->json(['error' => 'Nie udało się pobrać potwierdzenia.'], 500);
        }
    }

    /*** Generowanie pliku PDF z osadzoną czcionką. */
    private function createPdf($leader, $date, $participants)
    {
        return Pdf::loadView('service.confirmation', [
            'client' => $leader,
            'trip' => $date->trip,
            'date' => $date,
            'participants' => $participants
        ])  ->setPaper('A4')
            ->setOption('defaultFont', 'Arial');
    }
}
