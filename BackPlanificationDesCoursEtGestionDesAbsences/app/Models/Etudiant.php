<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etudiant extends Model
{
    use HasFactory, SoftDeletes;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function emmergements()
    {
        return $this->hasMany(Emmergement::class);
    }
    
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function anneeScolaires()
    {
        return $this->belongsToMany(AnneeScolaire::class);
    }

    public function classeOuverts()
    {
        return $this->belongsToMany(ClasseOuvert::class);
    }

    public function sessionDeCours()
    {
        return $this->belongsToMany(SessionDeCours::class);
    }
}
