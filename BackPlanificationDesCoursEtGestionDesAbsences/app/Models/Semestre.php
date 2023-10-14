<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semestre extends Model
{
    use HasFactory, SoftDeletes;


    public function anneeScolaires()
    {
        return $this->belongsToMany(AnneeScolaire::class);
    }

    public function anneeScolaireSemestres()
    {
        return $this->hasMany(AnneeScolaireSemestre::class);
    }
}
