<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name" => "required|string|max:50",
            "username" => "required|string|unique:users|min:3|max:50",
            "email" => "required|email|unique:users",
            "password" => "required|string|confirmed",
            "password_confirmation" => "required|string"
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "El nombre es requerido",
            "name.string" => "El nombre debe ser un string",
            "username.required" => "El nombre de usuario es requerido",
            "username.string" => "El nombre de usuario debe ser un string",
            "username.unique" => "El nombre de usuario ya está en uso",
            "username.min" => "El nombre de usuario debe tener al menos 3 caracteres",
            "username.max" => "El nombre de usuario debe tener como máximo 50 caracteres",
            "email.required" => "El correo es requerido",
            "email.email" => "El correo debe ser un correo válido",
            "email.unique" => "El correo ya está en uso",
            "password.required" => "La contraseña es requerida",
            "password.string" => "La contraseña debe ser un string",
            "password.confirmed" => "Las contraseñas no coinciden",
            "password_confirmation.required" => "La confirmación de la contraseña es requerida",
            "password_confirmation.string" => "La confirmación de la contraseña debe ser un string"
        ];
    }
}
