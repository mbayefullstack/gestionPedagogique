<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequestModule extends MyFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'module' => 'required|integer|exists:modules,id',
            'prof' => 'required|integer|exists:professeurs,id',
            'classes' => 'required|array',
            // 'classes.*.classe' => 'required|integer|exists:classes,id',
            'classes.*.classe' => 'required|integer|exists:classes,id|distinct',
            'classes.*.heure' => 'required|integer|min:1',
        ];
    }


    public function messages(): array
    {
        return [
            'module.required' => 'Le champ "module" est requis.',
            'module.integer' => 'Le champ "module" doit être un entier.',
            'module.exists' => 'Le champ "module" n\'existe pas dans la table "modules".',
            'prof.required' => 'Le champ "prof" est requis.',
            'prof.integer' => 'Le champ "prof" doit être un entier.',
            'prof.exists' => 'Le champ "prof" n\'existe pas dans la table "professeurs".',
            'classes.required' => 'Le champ "classes" est requis.',
            'classes.array' => 'Le champ "classes" doit être un tableau.',
            'classes.*.classe.required' => 'Le champ "classe" est requis pour chaque élément de "classes".',
            'classes.*.classe.integer' => 'Le champ "classe" doit être un entier pour chaque élément de "classes".',
            'classes.*.classe.exists' => 'Le champ "classe" n\'existe pas dans la table "classes" pour un élément de "classes".',
            'classes.*.classe.distinct' => 'Chaque classe doit avoir un ID unique dans la liste de classes.',
            'classes.*.heure.required' => 'Le champ "heure" est requis pour chaque élément de "classes".',
            'classes.*.heure.integer' => 'Le champ "heure" doit être un entier pour chaque élément de "classes".',
            'classes.*.heure.min' => 'Le champ "heure" doit avoir une valeur minimale de 1 pour chaque élément de "classes".',
        ];
    }
}
