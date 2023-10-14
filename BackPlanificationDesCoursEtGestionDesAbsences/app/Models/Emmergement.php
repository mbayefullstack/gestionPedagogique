<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emmergement extends Model
{
    use HasFactory, SoftDeletes;

    public function attache()
    {
        return $this->belongsTo(Attache::class);
    }

    public function justification()
    {
        return $this->hasOne(Justification::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function sessionDeCours()
    {
        return $this->belongsTo(SessionDeCours::class);
    }
}
