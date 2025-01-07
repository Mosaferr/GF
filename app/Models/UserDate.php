<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserDate extends Pivot
{
    use HasFactory;
    protected $table = 'users_dates'; // Ustawienie nazwy tabeli
    protected $fillable = ['user_id', 'date_id'];
}
