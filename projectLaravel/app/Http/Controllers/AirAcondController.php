<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAirAcondRequest;
use App\Models\AirAcond;
use App\Models\ReportesAA;
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
    public function update(UpdateAirAcondRequest $request, $id)
    {
        if (auth()->user()->role === 'guest') {
            abort(403, 'No tiene permisos para realizar esta acción.');
        }

        try {
            $aire = AirAcond::findOrFail($id);

            $aire->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Aire acondicionado actualizado correctamente.',
                'data' => $aire
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el aire acondicionado.' . $e->getMessage()
            ], 500);
        }

        // return redirect()->route('aires-acondicionados.index')->with('success', 'Aire Acondicionado actualizado exitosamente.');

        // Alerta de prueba para ver si llega al controlador
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Funcionalidad de actualización no implementada aún.'], 501);
    }

    public function history($id)
    {
        $historial = ReportesAA::where('aire_id', $id)
            ->latest('fecha_reporte')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Historial del aire acondicionado obtenido correctamente.',
            'history' => $historial
        ], 200);
    }

    public function downloadHistoryPDF($id)
    {
        $aire = AirAcond::with('bienNacional.area')->findOrFail($id);
        $historial = ReportesAA::where('aire_id', $id)
            ->latest('fecha_reporte')
            ->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.historial_ac', compact('aire', 'historial'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download("historial_aire_{$aire->numero_bn}.pdf");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AirAcond $airAcond)
    {
        //
    }
}
