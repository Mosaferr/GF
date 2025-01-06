<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['destination', 'flag', 'trip_name', 'country'];

    public function dates()
    {
        return $this->hasMany(Date::class);
    }
}
