<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoWeekend implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $date = new \DateTime($value);
        if (!in_array($date->format('w'), [0, 6])) {
            $fail('Les cours ne sont pas autorisés les weekends (samedi ou dimanche).');
            return;
        }

    }

    // public function passes($attribute, $value)
    // {
    //     $date = new \DateTime($value);

    //     return !in_array($date->format('w'), [0, 6]);
    // }

    // public function message()
    // {
    //     return 'Les cours ne sont pas autorisés les weekends (samedi ou dimanche).';
    // }
}
