<?php

namespace App\Http\Requests\auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegistroRequest extends FormRequest
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

            'txtnombre' => 'required|string|max:255',
            'txtapellido_paterno' => 'string|nullable|max:255',
            'txtapellido_materno' => 'string|nullable|max:255',
            'txtemail' => 'required|string|email',
            'txtpassword' => 'required|string|min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_])(?=.*[\d]).+$/',
            'txtavatar' => 'file|mimes:png,jpg,jpeg|nullable',
            'enumsexo' => 'in:hombre,mujer,pepe|nullable',
            'iedad' => 'required|numeric|min:1|max:200',
            'roles' => 'required|array',
            'roles.*' => 'numeric|exists:tbl_roles,iid'        
        ];
    }

    public function messages(): array
    {
        return 
        [
            'txtnombre.required' => 'Este campo es obligatorio',
            'txtemail.required' => 'Este campo es obligatorio',
            'txtemail.email' => 'Ingresa un correo valido @',
            'txtpassword.required' => 'Este campo es obligatorio',
            'txtpassword.min' => 'La contraseña debe ser minimo 8 caracteres',
            'txtpassword.max' => 'La contraseña debe ser como maximo 20 caracteres',
            'txtavatar.file' => 'Seleccione un archivo valido',
            'txtavatar.mimes' => 'El archivo solo es permitido en formato png,jpg,jpeg',
            'enumsexo.in' => 'Las opciones disponibles son hombre, mujer o pepe',
            'txtpassword.regex' => 'La contraseña debe tener al menos una minuscula, una mayuscula, un numero y un signo random',
            'iedad.required' => 'Este campo es obligatorio',
            'iedad.min' => 'La edad minima es de un año ',
            'iedad.max' => 'La edad maxima es de 200 años',
            'roles.exists' => 'No existe el rol seleccionado'
        ];
        
    }


    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(

            response()->json([

                'status' => false,
                'message' => 'Campo(s) invalido(s) o erroneo(s)',
                'warning' => $validator->errors(),
                'code' => 400
            ],400)
            );
    }









}
