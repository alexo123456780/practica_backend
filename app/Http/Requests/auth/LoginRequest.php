<?php

namespace App\Http\Requests\auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'txtemail' => 'required|string|email',
            'txtpassword' => 'required|string'
        ];
    }

    public function messages(): array
    {

        return 
        [

            'txtemail.required' => 'Este campo es obligatorio',
            'txtpassword.required' => 'Este campo es obligatorio'
        ];
        
    }

    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(

            response()->json([

                'status' => false,
                'message' => 'Dato(s) invalido(s) o erroneo(s) corrija porfavor',
                'warning' => $validator->errors(),
                'code' => 400
            ],400)


            );
        
    }





}
