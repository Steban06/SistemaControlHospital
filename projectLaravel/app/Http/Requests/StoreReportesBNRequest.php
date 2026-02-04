<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportesBNRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bienes_nacional_id' => 'required|exists:bienes_nacionales,numero_bn',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|in:ASIGNACION,DESINCORPORADO,FALLA,MANTENIMIENTO,REPARACION,TRASLADO,OTRO',
            'estado' => 'required|string|in:Operativo,Fuera de servicio,En reparación,Desincorporado',
        ];
    }

    public function messages(): array
    {
        return [
            'bienes_nacional_id.required' => 'El ID del bien nacional es obligatorio.',
            'bienes_nacional_id.exists' => 'El bien nacional seleccionado no existe.',
            'titulo.required' => 'El título del reporte es obligatorio.',
            'descripcion.required' => 'La descripción del reporte es obligatoria.',
            'tipo.required' => 'El tipo de reporte es obligatorio.',
            'tipo.in' => 'El tipo de reporte seleccionado no es válido.',
            'estado.required' => 'El estado del reporte es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
        ];
    }

    public function attributes()
    {
        return [
            'bienes_nacional_id' => 'Bien Nacional',
            'titulo' => 'Título del Reporte',
            'descripcion' => 'Descripción del Reporte',
            'tipo' => 'Tipo de Reporte',
            'estado' => 'Estado del Reporte',
        ];
    }
}
