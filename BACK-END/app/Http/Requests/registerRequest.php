<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use function PHPSTORM_META\type;

class registerRequest extends FormRequest
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
            'login' => 'required|unique:users',
            'password' => 'required|min:5',
            'type' => 'required|in:0,1,2',
            'pat_nom' => 'required_if:type,0',
            'pat_prenom' => 'required_if:type,0',
            'pat_ville' => 'required_if:type,0',
            'pat_dateNais' => 'required_if:type,0|date',
            'pat_tel' => 'nullable',
            'med_nom' => 'required_if:type,1',
            'med_prenom' => 'required_if:type,1',
            'med_ville' => 'required_if:type,1',
            'med_dateNais' => 'required_if:type,1|date',
            'med_tel' => 'required_if:type,1',
            'specialite_id' => 'required_if:type,1|exists:specialites,id',
            'adm_nom' => 'required_if:type,2',
            'adm_prenom' => 'required_if:type,2',
            'adm_ville' => 'required_if:type,2',
            'adm_dateNais' => 'required_if:type,2|date',
            // adm_email est supprimé car il n'est pas dans la table admins
            // adm_email' => 'required_if:type,2|unique:users,email',
            'adm_tel' => 'required_if:type,2',
         ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            "status_code" => 422,
            "massage" => "Erreur de validation",
            "errorList "=> $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nom.required'=>'Veillez entrer un nom',
            'nom.min'=>'Le nom doit faire au moins 3 caracteres',
            'nom.max'=>'Le nom ne doit pas depasser 100 caracteres',
            'nom.unique'=>'Ce nom est deja utiliser',

            'prenom.required'=>'Veillez entrer un prenom',
            'prenom.min'=>'Le nom doit faire au moins 3 caracteres',
            'prenom.max'=>'Le nom ne doit pas depasser 100 caracteres',
            'prenom.unique'=>'Ce nom est deja utiliser',

            'date_de_naissance.required'=>'Velleiz Entrer une date de naissance',
            'date_de_naissance.date_format'=>"Entrer une date valide (d/m/y)",

            'ville.required' => 'Veillez ajouter votre ville',
            'ville.in' => 'Le choix de la ville est invalide',

            'num_tel.required' => 'Veillez entrer un numero de telephone',
            'num_tel.digits' => 'Le numero ne doit contenir que les 9 chiffres',

            'type.required' => 'Veillez choisir le type de personne que vous etes',
            'type.in' => 'Le choix de type est invalide',


            'login.required'=>'Veillez entrer un login',
            // 'login.min'=>'Le nom doit faire au moins 5 caracteres',
            // 'login.max'=>'Le nom doit faire au moins 100 caracteres',
            'login.unique'=>"Ce login est deja utilise",

            'password.required'=>'veillez votre mot de passe',
            'password.min'=>'Le mot de passe doit faire minimum 5 caracteres',

            // 'spec_nom.required'=>'Veillez entrer un specialite',
            // 'spec_nom.in' => 'Le choix de la specialite est invalide',
        ];
    }
}
