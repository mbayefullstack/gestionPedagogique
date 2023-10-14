<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnneeScolaire extends Model
{
    use HasFactory, SoftDeletes;

   

    public function semestres()
    {
        return $this->belongsToMany(Semestre::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function classeOuvertsIns()
    {
        return $this->belongsToMany(ClasseOuvert::class);
    }

    public function classeOuverts()
    {
        return $this->hasMany(ClasseOuvert::class);
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }

    public function anneeScolaireSemestres()
    {
        return $this->hasMany(AnneeScolaireSemestre::class);
    }
}
