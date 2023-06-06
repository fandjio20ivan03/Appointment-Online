<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CameroonCity implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //

        $cities = [
            'Douala',
            'Yaoundé',
            'Bamenda',
            'Bafoussam',
            'Garoua',
            // Ajoutez d'autres villes ici
        ];

        if (!in_array($value, $cities)) {
            $fail('La ville entrée n\'est pas une ville valide du Cameroun.');
        }
    }

    //    public function message()
    //    {
    //        return 'Le champ :attribute doit être une ville du Cameroun.';
    //    }
}
