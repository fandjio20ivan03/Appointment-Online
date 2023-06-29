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
            'Maroua',
            'Ngaoundéré',
            'Kumba',
            'Loum',
            'Mbouda',
            'Bertoua',
            'Eséka',
            'Foumban',
            'Kribi',
            'Limbé',
            'Nkongsamba',
            'Sangmélima',
            'Tiko',
            'Wum',
            'Dschang'
        ];

        if (!in_array($value, $cities)) {
            $fail('La ville entrée n\'est pas une ville valide du Cameroun.');
        }
    }


}
