<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

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
            'txtpassword' => 'required|string|min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[_W/])(?=.*[\d]).+$/',
            'txtavatar' => 'file|mimes:png,jpg,jpeg'

            
        ];
    }









}
