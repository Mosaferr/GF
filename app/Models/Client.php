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
        'passport_issue_date',
        'passport_expiry_date',
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

    public function leader()
    {
        return $this->belongsTo(Client::class, 'leader_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Client::class, 'leader_id');
    }

    public function dates()
    {
        return $this->belongsToMany(Date::class, 'clients_dates');
    }
}
