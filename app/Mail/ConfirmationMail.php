<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $pdfData; // Binarne dane PDF (nie obiekt DOMPDF)

    /*** Create a new message instance. */
    public function __construct($client, $pdfData = null) // Domyślnie PDF może być null
    {
        $this->client = $client;
        $this->pdfData = $pdfData; // PDF jest już gotowy
    }

    public function build()
    {
        $email = $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject('Potwierdzenie rezerwacji')
                    ->view('emails.confirmation');

        if (!empty($this->pdfData)) { // Jeśli `$pdfData` nie jest puste, dodaj załącznik
            $email->attachData(base64_decode($this->pdfData), 'potwierdzenie.pdf', [
                'mime' => 'application/pdf',
            ]);
        }

        return $email;
    }
}
