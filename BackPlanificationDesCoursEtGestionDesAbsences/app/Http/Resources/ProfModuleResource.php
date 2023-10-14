<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        $classes = $this->classOuverts;
        $prof = $this->professeur;
        $prof_user = $prof->user;
        $proff = [
            "id" => $prof->id,
            "prenom" => $prof_user->prenom,
            "nom" => $prof_user->nom,
            "adresse" => $prof_user->adresse,
            "tel" => $prof_user->tel,
            "email" => $prof_user->email,
            "photo" => $prof_user->photo,
            "grade" => $prof->grade,
            "specialite" => $this->specialite,
        ];
        $data = [
            "id" => $this->id,
            "professeur" => $proff,
            "module" => $this->module,
            "classes" => [],
        ];

        foreach ($classes as $classe) {
            $nbHeureGlobal = $classe->pivot->nb_heure_global;
            $cl = ClasseOuvertResource::make($classe);
            $cl['heure'] = $nbHeureGlobal;

            $data['classes'][] = $cl;
        }

        return $data;
    }
}
