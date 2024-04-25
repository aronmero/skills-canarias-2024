<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class reservaRequest extends FormRequest
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
            'eventos_id' => [
                'required',
                'exists:eventos,id',
                Rule::unique('reservas')->where(function ($query) {
                    return $query->where('eventos_id', $this->eventos_id);
                })
            ],
            'salas_id' => [
                'required',
                'exists:salas,id',
                Rule::unique('reservas')->where(function ($query) {
                    return $query->where('salas_id', $this->eventos_id);
                })
            ],
            'fecha' => 'required|date|after:yesterday',
        ];
    }

    public function messages()
    {
        return [

            'fecha' => [
                'required' => 'La fecha es obligatoria.',
                'date' => 'La fecha debe ser una fecha válida.',
                'after' => 'La fecha no debe ser anterior a hoy.',
            ],
            'salas_id' => [
                'required' => 'Debe seleccionar al menos una sala.',
                'exists' => 'Uno o más de los salas seleccionados no son válidos.'
            ],
            'eventos_id' => [
                'required' => 'Debe seleccionar al menos un evento.',
                'exists' => 'Uno o más de los eventos seleccionados no son válidos.'
            ],
            'salas_id.unique' => 'Ya existe una entrada con el mismo "sala" y "evento".',
            'eventos_id.unique' => 'Ya existe una entrada con el mismo "sala" y "evento".',

        ];
    }
}
