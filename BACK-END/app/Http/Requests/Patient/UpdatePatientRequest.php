<?php

namespace App\Http\Requests\Patient;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePatientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // j'effectue une verification sur les differents attributs de ma table patient

            'pat_nom' => 'required|string|max:100',
            'pat_prenom' => 'required|string|max:100',
            // 'pat_ville' => 'required|string|in:Douala, Yaounde, Marroua, nkongsamba, dschang',
            'pat_dateNais' => 'required|date|before:today',
            'pat_email' => 'required|email|unique:patients,pat_email',
            'pat_tel' => 'required|string|unique:patients,pat_tel'
            // 'pat_tel' => 'required|string|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'
        ];
    }


    public function messages(): array
    {
        return [
            'pat_nom.required' => 'Un nom doit etre fournis',
            'pat_prenom.required' => 'Un prenom doit etre fournis',

            'pat_dateNais.required' => 'le champs date est obligatoire',
            'pat_dateNais.date' => 'la date entree n\'est pas valide',
            'pat_dateNais.before' => 'Une date doit etre renseigner or mis la date d\'aujourd\'hui',

            'pat_email.required' => 'le champs email est obligatoire',
            'pat_email.email' => 'l\'email entrer n\'est pas valide veillez entrer une adresse mail valide',
            'pat_email.unique' => 'cette adresse mail existe deja veillez entrer une autres s\'il vous plait',

            'pat_tel.required' => 'le champs numero de telephone est obligatoire',
            'pat_tel.string' => 'le numero entrer ne possede pas l\'identifiant d\'un pays',
            'pat_tel.unique' => 'le numero entrer existe deja veillez entrer un autre',
            // 'pat_tel.regex' => 'ce numero de telephone n\'est pas valide',
        ];
    }

    /**
    * @param \Illuminate\Contracts\Validation\Validator $validator
    * @return void
    * @throws \Illuminate\Validation\ValidationException
    */
    public function failedValidation(Validator $validator) {
        throw new  HttpResponseException(response()->json([
            'succes' => false,
            'error' => true,
            'message' => 'erreur de validation',
            'errorList' => $validator->errors()
        ]));
    }
}
