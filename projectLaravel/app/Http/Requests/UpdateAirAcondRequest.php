<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAirAcondRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
        'numero_bn' => [
            'required',
            'string',
            'max:255',
            'unique:aires_acondicionados,numero_bn,' . $id,
            'unique:bienes_nacionales,numero_bn',
        ],
        'nombre_aa' => 'required|string|max:255',
        'modelo' => 'nullable|string|max:255',
        'capacidad' => 'nullable|string|max:255',
        'voltaje_rango' => 'nullable|string|max:255',
        'refrigerante_tc' => 'nullable|string|max:255',
        'presion_alta' => 'nullable|string|max:255',
        'presion_baja' => 'nullable|string|max:255',
        'estado' => 'required|in:operativo,mantenimiento,fuera de servicio',
        'especificaciones' => 'nullable|string'
    ];
    }

    public function messages(): array
    {
        return [
            'numero_bn.required' => 'El número de bien nacional es obligatorio.',
            'numero_bn.unique' => 'Este número de bien nacional ya existe.',
            'nombre_aa.required' => 'El nombre del aire acondicionado es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.'
        ];
    }
}
