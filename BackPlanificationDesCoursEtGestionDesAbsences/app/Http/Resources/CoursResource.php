<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $proMod = $this->profModule;
        return [
            "id" => $this->id,
            "module" => $proMod->module,
            "prof" => $proMod->professeur,
        ];
    }
}
