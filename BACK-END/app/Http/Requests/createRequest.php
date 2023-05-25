<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
}
