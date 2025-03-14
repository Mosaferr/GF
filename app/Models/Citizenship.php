<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizenship extends Model
{
    use HasFactory;

    protected $fillable = ['citizenship'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
