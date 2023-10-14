<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClasseOuvert extends Model
{
    use HasFactory, SoftDeletes;


    
    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function anneeScolairesIns()
    {
        return $this->belongsToMany(AnneeScolaire::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function cours()
    {
        return $this->hasMany(Cours::class, 'classe_ouvert_id');
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function dispoClasse($date, $debut, $fin){
        $sessions = ($this->load('cours')->cours)->map(function($cours) use ($date, $debut, $fin) {
                return $cours->sessionDeCours()
                            ->where('date_cours', $date)
                            ->where(function ($query) use ($debut, $fin) {
                                $query->where(function ($query) use ($debut, $fin) {
                                    $query->where('heure_debut', '>', $debut)
                                        ->where('heure_debut', '<', $fin);
                                })->orWhere(function ($query) use ($debut, $fin) {
                                    $query->where('heure_fin', '>', $debut)
                                        ->where('heure_fin', '<', $fin);
                                })->orWhere(function ($query) use ($debut, $fin) {
                                    $query->where('heure_debut', '=', $debut)
                                        ->where('heure_fin', '=', $fin);
                                })->orWhere(function ($query) use ($debut, $fin) {
                                    $query->where('heure_debut', '<', $debut)
                                        ->where('heure_fin', '>', $fin);
                                });
                            })
                            ->get();
                    })->flatten();
        return $sessions;
    }


}
