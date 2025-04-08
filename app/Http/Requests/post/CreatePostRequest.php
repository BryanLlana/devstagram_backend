<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            "title" => "required|string|max:100",
            "description" => "required|string|max:500",
            "image" => "required|image|mimes:jpeg,png,jpg|max:5000"
        ];
    }

    public function messages() : array {
        return [
            "title.required" => "El título es requerido",
            "title.string" => "El título debe ser un string",
            "title.max" => "El título debe tener como máximo 100 caracteres",
            "description.required" => "La descripción es requerida",
            "description.string" => "La descripción debe ser un string",
            "description.max" => "La descripción debe tener como máximo 500 caracteres",
            "image.required" => "La imagen es requerida",
            "image.image" => "La imagen debe ser una imagen",
            "image.mimes" => "La imagen debe ser de tipo jpeg, png o jpg",
            "image.max" => "La imagen debe tener como máximo 5MB",
        ]; 
    }
}
