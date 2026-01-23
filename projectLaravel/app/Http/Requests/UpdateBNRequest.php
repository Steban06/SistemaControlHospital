<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBNRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'numero_bn' => 'required|string|max:255|unique:bienes_nacionales,numero_bn,' . $id,
            'nombre' => 'required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'serial' => 'nullable|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'estado' => 'required|in:Operativo,Fuera de servicio,En reparación,Desincorporado'
        ];
    }

    public function messages(): array
    {
        return [
            'numero_bn.required' => 'El número de bien nacional es obligatorio.',
            'numero_bn.unique' => 'Este número de bien nacional ya existe.',
            'nombre.required' => 'El nombre del bien es obligatorio.',
            'area_id.required' => 'La ubicación es obligatoria.',
            'area_id.exists' => 'La ubicación seleccionada no es válida.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.'
        ];
    }

    public function attributes()
    {
        return [
            'numero_bn' => 'Número de Bien Nacional',
            'nombre' => 'Nombre del Bien',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serial' => 'Número de Serie',
            'area_id' => 'Ubicación',
            'categoria_id' => 'Categoría',
            'estado' => 'Estado'
        ];
    }
}
