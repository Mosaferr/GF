<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'start_date', 'end_date', 'price', 'available_seats'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'clients_dates');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_dates');
    }
}
