<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class SessionDeCours extends Model
{
    use HasFactory, SoftDeletes;

    public function attache()
    {
        return $this->belongsTo(Attache::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class, "cours_id");
    }

    public function emmergements()
    {
        return $this->hasMany(Emmergement::class);
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function rp()
    {
        return $this->belongsTo(RP::class);
    }


    public static function createSessions(Request $data){
        $sessionDeCours = new SessionDeCours();
        $cours = Cours::findCoursByAll($data->module, $data->prof, $data->classe);
        if(!$cours) throw new Exception("Cours not found", 404);

        $heure_debut = Carbon::createFromFormat('H:i:s', $data->heure_debut);
        $heure_fin = Carbon::createFromFormat('H:i:s', $data->heure_fin);
        $duree_en_minutes = $heure_fin->diffInMinutes($heure_debut);
        $duree_en_heures = $duree_en_minutes / 60;

        $cours->nb_heure_deroule = $cours->nb_heure_deroule + $duree_en_heures;
        $quota = $cours->nb_heure_global - $cours->nb_heure_deroule;

        if($quota < 0) throw new Exception("Le nombre d'heure restante est insuffisant", 300);

        $sessionDeCours->cours_id = $cours->id;
        $sessionDeCours->r_p_id = 1;
        $sessionDeCours->date_cours = $data->date_cours;
        $sessionDeCours->heure_debut = $data->heure_debut;
        $sessionDeCours->heure_fin = $data->heure_fin;
        
        if ($data->has('salle') && $data->salle != null) {
            $salle = Salle::find($data->salle);
            if (!$salle) throw new Exception("Salle not found", 404);
            $sessions = $salle->dispoSalle($data->date_cours, $data->heure_debut, $data->heure_fin);
            if(!$sessions->isEmpty()) throw new Exception("Salle non disponible", 300);
            
            $sessionDeCours->salle_id = $salle->id;
        }
        $sessionDeCours->dispoProfEtClasse($data->prof,$data->classe);

        $cours->save();
        $sessionDeCours->save();

        return $sessionDeCours;
    }

    public function dispoProfEtClasse($prof, $classe){
        $prof = Professeur::findOrFail($prof);
        $classe = ClasseOuvert::findOrFail($classe);
        $dispoClasse = $classe->dispoClasse($this->date_cours, $this->heure_debut, $this->heure_fin);
        if(!$dispoClasse->isEmpty()) throw new Exception("Classe non disponible", 300);
        $dispoProf = $prof->dispoProf($this->date_cours, $this->heure_debut, $this->heure_fin);
        if(!$dispoProf->isEmpty()) throw new Exception("Prof non disponible", 300);
        return true;
    }
}
