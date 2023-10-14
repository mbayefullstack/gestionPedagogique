<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionDeCoursResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $cours =$this->cours;
        $proMod = $cours->profModule;
        return [
            "id" => $this->id,
            "date_cours" => $this->date_cours,
            "heure_debut" => $this->heure_debut,
            "heure_fin" => $this->heure_fin,
            "module" => $proMod->module,
            "prof" => $proMod->professeur,
            "classe" => new ClasseOuvertResource($cours->classeOuvert),
        ];
    }
}
