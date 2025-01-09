<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'middle_name',
        'last_name',
        'birth_date',
        'gender',
        'stage',
        'phone',
        'email',
        'pesel',
        'citizenship_id',
        'passport_number',
        'issue_date',
        'expiry_date',
        'address_id',
        'leader_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function citizenship()
    {
        return $this->belongsTo(Citizenship::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function dates()
    {
        return $this->belongsToMany(Date::class, 'clients_dates');
    }
}
