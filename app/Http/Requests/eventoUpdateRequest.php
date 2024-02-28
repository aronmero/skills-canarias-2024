<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventoUpdateRequest extends FormRequest
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
            'nombre' => 'string|min:3',
            'comensales' => 'integer|max:3|max:120',
            'fecha' => 'date|after:yesterday',
        ];
    }

    public function messages()
    {
        return [
            'nombre' => [
                'min' => 'El nombre debe tener al menos 3 caracteres.',
            ],
            'comensales' => [
                'integer' => 'El numero de comensales debe ser un número entero.',
                'between' => 'El numero de comensales debe ser mayor a 0 y menor o igual a 120'
            ],
            'fecha' => [
                'date' => 'La fecha debe ser una fecha válida.',
                'after' => 'La fecha no debe ser anterior a hoy.',
            ],

        ];
    }
}
