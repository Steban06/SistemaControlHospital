<?php

namespace App\Http\Controllers;

use App\Models\AirAcond;
use Illuminate\Http\Request;

class AirAcondController extends Controller
{
    public function index()
    {
        $aires = AirAcond::with(['materialesFaltantes', 'bienNacional.area'])->get();
        $areas = \App\Models\Area::all(); // Assuming Area model is in App\Models namespace based on BNController
        
        // Statistics
        $totalAires = $aires->count();
        $operativosCount = $aires->where('estado', 'operativo')->count();
        $mantenimientoCount = $aires->where('estado', 'mantenimiento')->count();
        $fueraCount = $aires->where('estado', 'fuera de servicio')->count();
        
        $operativosPorcentaje = $totalAires > 0 ? round(($operativosCount / $totalAires) * 100) : 0;

        return view('aires-acondicionados', compact('aires', 'areas', 'totalAires', 'operativosCount', 'mantenimientoCount', 'fueraCount', 'operativosPorcentaje'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role === 'guest') {
             return response()->json(['success' => false, 'message' => 'No tiene permisos para realizar esta acción.'], 403);
        }
        $aire = AirAcond::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Aire acondicionado agregado exitosamente.',
            'data' => $aire
        ], 201);

        // Alerta de prueba para ver si llega al controlador
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Funcionalidad de creación no implementada aún.'], 501);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aire = AirAcond::findOrFail($id);
        
        // Decode especificaciones JSON
        $especificaciones = json_decode($aire->especificaciones, true) ?? [];
        
        // Prepare response with all fields (same structure as edit for consistency)
        $data = [
            'id' => $aire->id,
            'numero_bn' => $aire->numero_bn,
            'nombre_aa' => $aire->nombre_aa,
            'modelo' => $aire->modelo,
            'estado' => $aire->estado,
            'capacidad' => $aire->capacidad,
            'voltaje' => $aire->voltaje_rango,
            'refrigerante' => $aire->refrigerante_tc,
            'presion_alta' => $aire->presion_alta,
            'presion_baja' => $aire->presion_baja,
            'observaciones' => $especificaciones['observaciones'] ?? '',
            'created_at' => $aire->created_at,
            'updated_at' => $aire->updated_at
        ];
        
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aire = AirAcond::findOrFail($id);
        
        // Decode especificaciones JSON
        $especificaciones = json_decode($aire->especificaciones, true) ?? [];
        
        // Prepare response with all fields
        $data = [
            'id' => $aire->id,
            'numero_bn' => $aire->numero_bn,
            'nombre_aa' => $aire->nombre_aa,
            'modelo' => $aire->modelo,
            'estado' => $aire->estado,
            'capacidad' => $aire->capacidad,
            'voltaje' => $aire->voltaje_rango,
            'refrigerante' => $aire->refrigerante_tc,
            'presion_alta' => $aire->presion_alta,
            'presion_baja' => $aire->presion_baja,
            'observaciones' => $especificaciones['observaciones'] ?? ''
        ];
        
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role === 'guest') {
            abort(403, 'No tiene permisos para realizar esta acción.');
        }
        $aire = AirAcond::findOrFail($id);
        
        $validated = $request->validate([
            'numero_bn' => 'required|string|unique:aires_acondicionados,numero_bn,' . $id,
            'marca' => 'required|string',
            'modelo' => 'nullable|string',
            'tipo_unidad' => 'required|string',
            'capacidad' => 'nullable|string',
            'voltaje' => 'nullable|string',
            'refrigerante' => 'nullable|string',
            'estado' => 'required|in:operativo,mantenimiento,fuera de servicio',
            // Optional fields
            'numero_serie' => 'nullable|string',
            'consumo_energetico' => 'nullable|string',
            'temperatura' => 'nullable|string',
            'horas_uso' => 'nullable|string',
            'fecha_instalacion' => 'nullable|date',
            'ultimo_mantenimiento' => 'nullable|date',
            'proximo_mantenimiento' => 'nullable|date',
            'responsable' => 'nullable|string',
            'ubicacion' => 'nullable|string',
            'area_especifica' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        // Construct nombre_aa
        $nombre_aa = trim("{$validated['marca']} {$validated['tipo_unidad']} {$validated['modelo']}");

        // Prepare specifications JSON
        $especificaciones = [
            'numero_serie' => $request->numero_serie,
            'marca' => $request->marca, 
            'tipo_unidad' => $request->tipo_unidad,
            'consumo_energetico' => $request->consumo_energetico,
            'temperatura' => $request->temperatura,
            'horas_uso' => $request->horas_uso,
            'fecha_instalacion' => $request->fecha_instalacion,
            'ultimo_mantenimiento' => $request->ultimo_mantenimiento,
            'proximo_mantenimiento' => $request->proximo_mantenimiento,
            'responsable' => $request->responsable,
            'ubicacion_descripcion' => $request->ubicacion,
            'area_especifica' => $request->area_especifica,
            'observaciones' => $request->observaciones,
        ];

        $aire->update([
            'numero_bn' => $validated['numero_bn'],
            'nombre_aa' => $nombre_aa,
            'modelo' => $validated['modelo'],
            'capacidad' => $validated['capacidad'],
            'voltaje_rango' => $validated['voltaje'],
            'refrigerante_tc' => $validated['refrigerante'],
            'estado' => strtolower($validated['estado']),
            'especificaciones' => json_encode($especificaciones),
        ]);

        return redirect()->route('aires-acondicionados.index')->with('success', 'Aire Acondicionado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AirAcond $airAcond)
    {
        //
    }
}
