<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Client;
use App\Models\Date;

class ConfirmationController extends Controller
{
    public function generatePDF($clientId, $dateId)
    {
        $client = Client::with(['address.city', 'citizenship'])
                        ->findOrFail($clientId);

        $date = Date::with('trip')->findOrFail($dateId);

        $pdf = Pdf::loadView('service.confirmation', [
            'client' => $client,
            'trip' => $date->trip,
            'date' => $date
        ]);

        return $pdf->download('potwierdzenie.pdf');
    }
}
