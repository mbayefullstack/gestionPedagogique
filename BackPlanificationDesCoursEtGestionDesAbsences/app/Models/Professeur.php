<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professeur extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['grade'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profModules()
    {
        return $this->hasMany(ProfModule::class);
    }

    public function modules(){
        return $this->belongsToMany(Module::class);
    }

    public function cours(){
        return $this->belongsToMany(Cours::class);
    }

    public function dispoProf($date, $debut, $fin){
        $profModules = $this->profModules;
    
        $sessions = collect();
    
        foreach ($profModules as $profModule) {
            $cours = $profModule->cours->map(function($cours) use ($date, $debut, $fin) {
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
            $sessions = $sessions->concat($cours);
        }
    
        return $sessions;
    }
    

}
