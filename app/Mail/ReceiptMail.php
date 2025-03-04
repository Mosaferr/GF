<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $trip;  // ✅ Dodano brakującą właściwość
    public $date;  // ✅ Dodano brakującą właściwość
    public $pdfData; // Binarne dane PDF (nie obiekt DOMPDF)

    /*** Create a new message instance.
     */
    public function __construct($client, $trip, $date, $pdfData = null) //  Domyślnie PDF może być null ✅ Dodano `$trip` i `$date`
    {
        $this->client = $client;
        $this->trip = $trip;
        $this->date = $date;
        $this->pdfData = $pdfData;      // PDF jest już gotowy
    }

    public function build()
    {
        $email = $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject('Rachunek za wyprawę')
                    ->view('emails.receipt')
                    ->with([
                        'client' => $this->client,
                        'trip' => $this->trip,  // ✅ Teraz `$trip` jest zdefiniowane
                        'date' => $this->date   // ✅ Teraz `$date` jest zdefiniowane
                    ]);

        if (!empty($this->pdfData)) { // Jeśli `$pdfData` nie jest puste, dodaj załącznik
            $email->attachData(base64_decode($this->pdfData), 'rachunek.pdf', [
                'mime' => 'application/pdf',
            ]);
        }
        return $email;
    }
}
