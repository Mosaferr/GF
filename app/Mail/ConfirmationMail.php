<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use App\Models\Client;
// use App\Models\Date;
// use App\Models\UserDate;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $trip;
    public $date;
    public $pdfData; // Binarne dane PDF (nie obiekt DOMPDF)

    /*** Konstruktor */
    public function __construct($client, $trip, $date, $pdfData = null) // ✅ Dodano `$trip` i `$date`
    {
        $this->client = $client;
        $this->trip = $trip;
        $this->date = $date;
        $this->pdfData = $pdfData;
    }

    public function build()
    {
        $email = $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject('Potwierdzenie rezerwacji')
                    ->view('emails.confirmation')
                    ->with([
                        'client' => $this->client,
                        'trip' => $this->trip, // Dodajemy brakującą zmienną!
                        'date' => $this->date
                    ]);

        if (!empty($this->pdfData)) { // Jeśli `$pdfData` nie jest puste, dodaj załącznik
            $email->attachData(base64_decode($this->pdfData), 'potwierdzenie.pdf', [
                'mime' => 'application/pdf',
            ]);
        }
        return $email;
    }
}
