<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnneeScolaireSemestre extends Model
{
    use HasFactory, SoftDeletes;

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function semestres()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}
