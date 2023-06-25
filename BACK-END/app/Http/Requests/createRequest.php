<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class createRequest extends FormRequest
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
            'med_nom' => 'required|string|max:100',
            'med_prenom' => 'required|string|max:100',
             'med_ville' => 'required|string|in:Douala, Yaounde, Marroua',
             'med_dateNaiss' => 'required|date|before:today',
             'med_email'=> 'required|email|unique:medecins,email',
             'med_tel'=>'required|min:9|max:9'
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            "status_code" => 422,
            "message"=>"Erreur de Validation",
            "errorList" => $validator->errors()
        ]));
    }

    public function messages()
    {
        return[
            "med_nom.required" => "Veillez Entrer votre nom",
            "med_nom.string" => "Le nom ne doit pas commencer par un chiffre",
            "med_nom.max" => "Le nom doit faire maximun 100 caracteres",

            "med_prenom.required" => "Veillez Entrer votre prenom",
            "med_prenom.string" => "Le nom ne doit pas commencer par un chiffre",
            "med_prenom.max" => "Le nom doit faire maximum 100 caracteres",

            'med_ville.required' => 'veillez selectionner votre ville parmi celles proposees',
            'med_ville.in'
        ];
    }
}
