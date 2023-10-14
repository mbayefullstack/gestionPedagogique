<?php

namespace App\Models;

use App\Http\Resources\ProfModuleResource;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cours extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'annee_scolaire_semestre_id',
        'nb_heure_global',
        'prof_module_id',
        'classe_ouvert_id',
    ];

    public function anneeScolaireSemestre()
    {
        return $this->belongsTo(AnneeScolaireSemestre::class);
    }

    public function classeOuvert()
    {
        return $this->belongsTo(classeOuvert::class);
    }

    public function profModule()
    {
        return $this->belongsTo(ProfModule::class, 'prof_module_id');
    }

    public function sessionDeCours(){
        return $this->hasMany(SessionDeCours::class);
    }

    // public function professeurs(){
    //     return $this->belongsToMany(Professeur::class);
    // }



    public static function created($attributes)
    {
    
        $annee_scolaire_semestre_id = 7;
        $prof_module = ProfModule::getProfModuleByIdProfAndIdModule($attributes["prof"],$attributes['module']);
        // parent::created($attributes); 
        $cours = [];

        foreach ($attributes['classes'] as $classe) {
            $cours[] = Cours::create([
                'annee_scolaire_semestre_id' => $annee_scolaire_semestre_id,
                'nb_heure_global' => $classe["heure"],
                'prof_module_id' => $prof_module->id,
                'classe_ouvert_id' => $classe["classe"],
            ]);
        }
        return new ProfModuleResource($prof_module);
    }

    public static function findCoursByAll($module, $prof, $classe){
        $annee_scolaire_semestre_id = 7;
        $prof_module = ProfModule::getProfModuleByIdProfAndIdModule($prof,$module);
        if(!$prof_module) throw new Exception("Module ou professeur non trouvé", 404);
        $cours = Cours::where(["prof_module_id" => $prof_module->id, "classe_ouvert_id" => $classe, "annee_scolaire_semestre_id" => $annee_scolaire_semestre_id])->first();
        if(!$cours) throw new Exception("Cours non trouvé", 404);
        return $cours;
    }
}
