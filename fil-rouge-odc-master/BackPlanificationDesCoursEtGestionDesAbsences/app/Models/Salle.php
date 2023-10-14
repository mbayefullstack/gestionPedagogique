<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salle extends Model
{
    use HasFactory, SoftDeletes;

    public function sessionDeCours(){
        return $this->hasMany(SessionDeCours::class);
    }


    public function dispoSalle($date, $debut, $fin) {
        $this->load('sessionDeCours');
    
        $sessions = $this->sessionDeCours->filter(function ($cours) use ($date, $debut, $fin) {
            return $cours->date_cours === $date &&
                (
                    ($cours->heure_debut >= $debut && $cours->heure_debut < $fin) ||
                    ($cours->heure_fin > $debut && $cours->heure_fin <= $fin) ||
                    ($cours->heure_debut <= $debut && $cours->heure_fin >= $fin)
                );
        });
    
        return $sessions;
    }
    

}
