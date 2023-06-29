<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class loginRequest extends FormRequest
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
            "login"=>'required|exists:users,login',
            "password" => 'required'
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
            'login.required'=>'Veillez entrer un login',
            // 'login.min'=>'Le nom doit faire au moins 5 caracteres',
            // 'login.max'=>'Le nom doit faire au moins 100 caracteres',
            'login.exists'=>"Ce login n'existe pas",

            'password.required'=>'veillez votre mot de passe',
            // 'password.min'=>'Le mot de passe doit faire minimum 5 caracteres'
        ];
    }
}
