<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventoRequest extends FormRequest
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
            'nombre' => 'required|string|min:3',
            'comensales' => 'required|integer|max:3|max:120',
            'usuario_id' => 'required|exists:users,id',
            'fecha' => 'required|date|after:yesterday',
        ];
    }

    public function messages()
    {
        return [
            'nombre' => [
                'required' => 'El nombre es obligatorio.',
                'min' => 'El nombre debe tener al menos 3 caracteres.',
            ],
            'comensales' => [
                'required' => 'El numero de comensales es obligatorio.',
                'integer' => 'El numero de comensales debe ser un número entero.',
                'between' => 'El numero de comensales debe ser mayor a 0 y menor o igual a 120'
            ],
            'fecha' => [
                'required' => 'La fecha es obligatoria.',
                'date' => 'La fecha debe ser una fecha válida.',
                'after' => 'La fecha no debe ser anterior a hoy.',
            ],
            'usuario_id' => [
                'required' => 'Debe seleccionar al menos un usuario.',
                'exists'=> 'Uno o más de los usuarios seleccionados no son válidos.'
            ],

        ];
    }
}
