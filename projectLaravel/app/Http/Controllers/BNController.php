<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBNRequest;
use App\Http\Requests\UpdateBNRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BN;
use App\Models\Categoria;
use App\Models\Area;

class BNController extends Controller
{
    public function index()
    {
        $bienesNacionales = BN::with(['categoria', 'area'])->get();
        $areas = Area::all();
        $categorias = Categoria::all();

        return view('bienes-nacionales', compact('bienesNacionales', 'areas', 'categorias'));
    }

    public function store(StoreBNRequest $request)
    {
        // Validar los datos recibidos con FormRequest
        $bien = BN::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Bien nacional agregado exitosamente.',
            'data' => $bien
        ], 201);
    }

    public function update(UpdateBNRequest $request, $id)
    {
        // Validar los datos recibidos
        // $validator = Validator::make($request->all(), [
        //     'numero_bn' => 'required|string|max:255|unique:bienes_nacionales,numero_bn,' . $id,
        //     'nombre' => 'required|string|max:255',
        //     'marca' => 'nullable|string|max:255',
        //     'modelo' => 'nullable|string|max:255',
        //     'serial' => 'nullable|string|max:255',
        //     'area_id' => 'required|exists:areas,id',
        //     'categoria_id' => 'required|exists:categorias,id',
        //     'estado' => 'required|in:Operativo,Dañado,En reparación,Desincorporado'
        // ], [
        //     'numero_bn.required' => 'El número de bien nacional es obligatorio.',
        //     'numero_bn.unique' => 'Este número de bien nacional ya existe.',
        //     'nombre.required' => 'El nombre del bien es obligatorio.',
        //     'area_id.required' => 'La ubicación es obligatoria.',
        //     'area_id.exists' => 'La ubicación seleccionada no es válida.',
        //     'categoria_id.required' => 'La categoría es obligatoria.',
        //     'categoria_id.exists' => 'La categoría seleccionada no es válida.',
        //     'estado.required' => 'El estado es obligatorio.',
        //     'estado.in' => 'El estado seleccionado no es válido.'
        // ]);

        // Si la validación falla, retornar errores
        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $validator->errors()
        //     ], 422);
        // }

        // try {
        //     // Encontrar el bien nacional por ID
        //     $bienNacional = BN::findOrFail($id);

        //     // Actualizar los datos del bien nacional
        //     $bienNacional->update([
        //         'numero_bn' => $request->numero_bn,
        //         'nombre' => $request->nombre,
        //         'marca' => $request->marca,
        //         'modelo' => $request->modelo,
        //         'serial' => $request->serial,
        //         'area_id' => $request->area_id,
        //         'categoria_id' => $request->categoria_id,
        //         'estado' => $request->estado
        //     ]);

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Bien nacional actualizado exitosamente.',
        //         'data' => $bienNacional
        //     ], 200);

        // } catch (\Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->getMessage()
        //     ], 500);
        // }

        try {
            $bien = BN::findOrFail($id);

            $bien->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Bien nacional actualizado correctamente.',
                'data' => $bien
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el bien nacional.' . $e->getMessage()
            ], 500);
        }
    }

}