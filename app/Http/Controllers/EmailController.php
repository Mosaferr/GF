<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Używanie konfiguracji Gmaila
        config(['mail.mailers.smtp.host' => env('GMAIL_HOST')]);
        config(['mail.mailers.smtp.port' => env('GMAIL_PORT')]);
        config(['mail.mailers.smtp.username' => env('GMAIL_USERNAME')]);
        config(['mail.mailers.smtp.password' => env('GMAIL_PASSWORD')]);
        config(['mail.mailers.smtp.encryption' => env('GMAIL_ENCRYPTION')]);
        config(['mail.from.address' => env('GMAIL_FROM_ADDRESS')]);
        config(['mail.from.name' => env('GMAIL_FROM_NAME')]);

        Mail::to(env('GMAIL_USERNAME'))->send(new ContactMail($details));

        return back()->with('success', 'Email został wysłany!');
    }
}
