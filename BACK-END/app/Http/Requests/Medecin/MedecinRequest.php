<?php

namespace App\Http\Requests\Medecin;

use App\Models\Medecin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Nette\Utils\Arrays;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class MedecinRequest extends FormRequest
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

        $emailUniqueRule = Rule::unique('medecins');
        if($this->method() == 'PUT'){
            $emailUniqueRule = Rule::unique('medecins','med_email')->ignore($this->id);
        }

        return [
            'med_nom' => 'required|string|max:100',
            'med_prenom' => 'required|string|max:100',
            'med_dateNais' => 'required|date|before:today',
            'med_email' => 'required|email|'.$emailUniqueRule,
            'med_ville' => 'required',
            'med_tel' => 'required|string',
        ];
    }


    public function messages(): array
    {
        return [
            'med_nom.required' => 'Un nom doit etre fournis',
            'med_prenom.required' => 'Un prenom doit etre fournis',

            'med_dateNais.required' => 'le champs date est obligatoire',
            'med_dateNais.date' => 'la date entree n\'est pas valide',
            'med_dateNais.before' => 'Une date doit etre renseigner or mis la date d\'aujourd\'hui',

            'med_email.required' => 'le champs email est obligatoire',
            'med_email.email' => 'l\'email entrer n\'est pas valide veillez entrer une adresse mail valide',
            'med_email.unique' => 'cette adresse mail existe deja veillez entrer une autres s\'il-vous-plait',

            'med_tel.required' => 'le champs numero de telephone est obligatoire',
            'med_tel.string' => 'le numero entrer ne possède pas l\'identifiant d\'un pays',

            'med_ville.required' => 'le champs ville de residence est obligatoire',
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
            'message' => 'Erreur de validation',
            'errorList' => $validator->errors(),
        ], 201));
    }

}
