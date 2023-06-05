<?php

namespace App\Http\Requests\Calendrier;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalendrierRequest extends FormRequest
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

                'date' => 'required | date',
                'heure_debut' => 'required | date_format:H:i:s | before:'.$this->input('heure_fin'),  // $validator en param de la mothode json pour recupere les messages appropries
                'heure_fin' => 'required | date_format:H:i:s',
        ];
    }


    public function messages(): array
    {
        return [
            'date.required' => 'la date doit est obligatoire',
            'date.date' => 'la date doit etre une date valide',
            'heure_dabut.required' => 'l\'heure de debut est obligatoire',
            'heure_debut.before' => 'l\'heure de debut doit etre avant celui de fin',
            'heure_debut.date_format' => 'l\'heure de debut doit etre valide',
            'heure_fin.required' => 'l\'heure de fin est obligatoire',
            'heure_fin.date_format' => 'l\'heure de fin doit etre valide'
        ];
    }

     /**
    * @param \Illuminate\Contracts\Validation\Validator $validator
    * @return void
    * @throws \Illuminate\Validation\ValidationException
    */
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'succes' => false,
            'error' => true,
            'message' => 'erreur de validation',
            'errorList' => $validator->errors()
        ]));
    }
}
