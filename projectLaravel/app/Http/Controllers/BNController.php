<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBNRequest;
use App\Http\Requests\UpdateBNRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BN;
use App\Models\Categoria;
use App\Models\Area;
use App\Models\ReportesBN;

class BNController extends Controller
{
    public function index()
    {
        $bienesNacionales = BN::with(['categoria', 'area'])->get();
        $areas = Area::all();
        $categorias = Categoria::all();

        // Calcular estadísticas de Aires Acondicionados dentro de Bienes Nacionales
        $acBienes = $bienesNacionales->filter(function ($bien) {
            return $bien->categoria && (
                stripos($bien->categoria->tipo, 'aire') !== false || 
                stripos($bien->categoria->tipo, 'acondicionado') !== false
            );
        });

        $acStats = [
            'total' => $acBienes->count(),
            'operativo' => $acBienes->where('estado', 'Operativo')->count(), // Ajustar según los valores reales en BD (Case sensitive?)
            'dañado' => $acBienes->whereIn('estado', ['Dañado', 'Fuera de servicio'])->count(),
            'reparacion' => $acBienes->where('estado', 'En reparación')->count(),
            'desincorporado' => $acBienes->where('estado', 'Desincorporado')->count(),
        ];

        return view('bienes-nacionales', ['pageTitle' => 'Gestión Bienes Nacionales'], compact('bienesNacionales', 'areas', 'categorias', 'acStats'));
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

    public function history($id)
    {
        // Lógica para obtener el historial del bien nacional
        // Traer historial de forma normal
        // $historial = ReportesBN::where('bienes_nacional_id', $id)->get();

        // Traer historial de forma descendente, es decir del ultimo al primero
        $historial = ReportesBN::where('bienes_nacional_id', $id)
            ->orderBy('id', 'desc')
            ->get();
                
        return response()->json([
            'success' => true,
            'message' => 'Historial del bien nacional obtenido correctamente.',
            'history' => $historial
        ], 200);
    }
}