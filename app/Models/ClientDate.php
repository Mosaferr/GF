<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientDate extends Pivot
{
    use HasFactory;
    protected $table = 'clients_dates'; // Ustawienie nazwy tabeli

    protected $fillable = ['client_id', 'date_id'];
}
