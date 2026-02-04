<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportesAARequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'aire_id' => 'required|exists:aires_acondicionados,numero_bn',
            'trabajo_realizado' => 'required|string|max:255',
            'descripcion_intervencion' => 'required|string',
            'tecnico_responsable' => 'required|string|max:255',
            'tipo_mantenimiento' => 'required|in:mantenimiento,reparacion,falla,instalacion,otro',
            'estado_final' => 'required|in:Operativo,En reparación,Fuera de servicio',
            'fecha_reporte' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'aire_id.required' => 'El ID del aire acondicionado es obligatorio.',
            'aire_id.exists' => 'El aire acondicionado seleccionado no existe.',
            'trabajo_realizado.required' => 'El trabajo realizado es obligatorio.',
            'descripcion_intervencion.required' => 'La descripción de la intervención es obligatoria.',
            'tecnico_responsable.required' => 'El técnico responsable es obligatorio.',
            'tipo_mantenimiento.required' => 'El tipo de mantenimiento es obligatorio.',
            'tipo_mantenimiento.in' => 'El tipo de mantenimiento seleccionado no es válido.',
            'estado_final.required' => 'El estado final es obligatorio.',
            'estado_final.in' => 'El estado final seleccionado no es válido.',
            'fecha_reporte.required' => 'La fecha del reporte es obligatoria.',
            'fecha_reporte.date' => 'La fecha del reporte no es una fecha válida.',
        ];
    }

    public function attributes()
    {
        return [
            'aire_id' => 'Aire Acondicionado',
            'trabajo_realizado' => 'Trabajo Realizado',
            'descripcion_intervencion' => 'Descripción de la Intervención',
            'tecnico_responsable' => 'Técnico Responsable',
            'tipo_mantenimiento' => 'Tipo de Mantenimiento',
            'estado_final' => 'Estado Final',
            'fecha_reporte' => 'Fecha del Reporte',
        ];
    }
}
