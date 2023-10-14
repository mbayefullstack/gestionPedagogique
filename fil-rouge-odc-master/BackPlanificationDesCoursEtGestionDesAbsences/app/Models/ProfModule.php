<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfModule extends Model
{
    use HasFactory, SoftDeletes;

    public function cours()
    {
        return $this->hasMany(cours::class);
    }

    public function professeur(){
        return $this->belongsTo(Professeur::class);
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function classOuverts(){
        return $this->belongsToMany(ClasseOuvert::class, "cours","prof_module_id","classe_ouvert_id")->withPivot("nb_heure_global");
    }



    public static function getProfModuleByIdProfAndIdModule($prof, $module){
        return ProfModule::where(["professeur_id"=>$prof,"module_id"=>$module])->first();
    }
}
