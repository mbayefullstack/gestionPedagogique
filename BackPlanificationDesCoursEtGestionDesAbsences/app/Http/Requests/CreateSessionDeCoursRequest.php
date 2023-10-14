<?php

namespace App\Http\Requests;

use App\Rules\NoWeekend;
use Illuminate\Foundation\Http\FormRequest;

class CreateSessionDeCoursRequest extends MyFormRequest
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
            'classe' => 'required|integer|exists:classe_ouverts,id',
            'salle' => 'nullable|integer|exists:salles,id',
            // 'date_cours' => 'required|date|after_or_equal:3 days|date_format:Y-m-d',
            'date_cours' => ['required', 'date', 'after_or_equal:3 days', 'date_format:Y-m-d', new NoWeekend],
            'heure_debut' => 'required|date_format:H:i:s|after_or_equal:08:00:00|before:heure_fin',
            'heure_fin' => 'required|date_format:H:i:s|after:heure_debut|before_or_equal:19:00:00',
        ];
    }

    public function messages()
    {
        return [
            'module.required' => 'Le champ Module est obligatoire.',
            'module.integer' => 'Le champ Module doit être un entier.',
            'module.exists' => 'Le module sélectionné n\'existe pas dans la base de données.',

            'prof.required' => 'Le champ Professeur est obligatoire.',
            'prof.integer' => 'Le champ Professeur doit être un entier.',
            'prof.exists' => 'Le professeur sélectionné n\'existe pas dans la base de données.',

            'classe.required' => 'Le champ Classe est obligatoire.',
            'classe.integer' => 'Le champ Classe doit être un entier.',
            'classe.exists' => 'La classe sélectionnée n\'existe pas dans la base de données.',

            'salle.integer' => 'Le champ Classe doit être un entier.',
            'salle.exists' => 'La classe sélectionnée n\'existe pas dans la base de données.',

            'date_cours.required' => 'Le champ Date du cours est obligatoire.',
            'date_cours.date' => 'Le champ Date du cours doit être une date valide.',
            'date_cours.after_or_equal' => 'La date du cours doit être d\'au moins 3 jours à partir d\'aujourd\'hui.',
            'date_cours.date_format' => 'Le format de la date doit être Y-m-d.',

            'heure_debut.required' => 'Le champ Heure de début est obligatoire.',
            'heure_debut.date_format' => 'Le format de l\'heure de début doit être H:i:s.',
            'heure_debut.after_or_equal' => 'L\'heure de début doit être au moins 08:00:00.',
            'heure_debut.before' => 'L\'heure de début doit être avant l\'heure de fin.',

            'heure_fin.required' => 'Le champ Heure de fin est obligatoire.',
            'heure_fin.date_format' => 'Le format de l\'heure de fin doit être H:i:s.',
            'heure_fin.after' => 'L\'heure de fin doit être après l\'heure de début.',
            'heure_fin.before_or_equal' => 'L\'heure de fin doit être au plus tard 19:00:00.',
        ];
    }
}
