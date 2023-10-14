<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfesseurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $this->user;
        return [
            "id" => $this->id,
            "prenom" => $user->prenom,
            "nom" => $user->nom,
            "adresse" => $user->adresse,
            "tel" => $user->tel,
            "email" => $user->email,
            "photo" => $user->photo,
            // "specialite" => $this->id,
            "grade"=>$this->grade,
        ];
    }
}
