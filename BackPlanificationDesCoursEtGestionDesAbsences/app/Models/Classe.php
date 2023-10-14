<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    use HasFactory, SoftDeletes;

    public function anneeScolaires()
    {
        return $this->belongsToMany(AnneeScolaire::class);
    }

    public function filliere()
    {
        return $this->belongsTo(Filliere::class);
    }

    public function classeOuverts()
    {
        return $this->hasMany(ClasseOuvert::class);
    }
}
