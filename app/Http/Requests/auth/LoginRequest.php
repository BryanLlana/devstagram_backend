<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

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
            "email" => "required|string",
            "password" => "required|string"
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "El correo es requerido",
            "email.string" => "El correo debe ser un string",
            "password.required" => "La contraseña es requerida",
            "password.string" => "La contraseña debe ser un string",
        ];
    }
}
