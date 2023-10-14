<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attache extends Model
{
    use HasFactory, SoftDeletes;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sessionDeCours()
    {
        return $this->hasMany(SessionDeCours::class);
    }

    public function justifications()
    {
        return $this->hasMany(Justification::class);
    }

    public function emmergements()
    {
        return $this->hasMany(Emmergement::class);
    }
}
