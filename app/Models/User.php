<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use Billable;

    /** The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'email',
        'participants', // Dodano nowe pole
        'password',
    ];

    /** The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** Get the attributes that should be cast.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** Relacja z tabelą Clients.
     */
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /** Relacja z tabelą Users_Dates.
     */
    public function dates()
    {
        return $this->belongsToMany(Date::class, 'users_dates');
    }
}
