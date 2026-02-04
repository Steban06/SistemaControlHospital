<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportesAARequest;
use App\Http\Requests\StoreReportesBNRequest;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Services\NotificationService;
use App\Models\BN; // Assuming you might link to BN or AirAcond
use App\Models\AirAcond;
use App\Models\ReportesAA;
use App\Models\ReportesBN;
use Carbon\Carbon;

    class MaintenanceController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        // Datos estáticos para demostración (Idealmente esto vendría de DB)
        // $totalMantenimientos = 12;
        // $preventivos = 8;
        // $correctivos = 4;
        // $esteMes = 3;

        // // Fetch assets
        $bienes = BN::all()->map(function($item) {
            return (object)[
                'id' => $item->id,
                'name' => $item->nombre,
                'code' => $item->numero_bn,
                'type' => 'Bien Nacional',
                'raw_type' => 'App\Models\BN' // Para polimorfismo si lo usas
            ];
        });

        $aires = AirAcond::all()->map(function($item) {
            return (object)[
                'id' => $item->id,
                'name' => $item->nombre_aa,
                'code' => $item->numero_bn,
                'type' => 'Aire Acondicionado',
                'raw_type' => 'App\Models\AirAcond'
            ];
        });

        $assets = $bienes->concat($aires)->sortBy('name')->values();

        $reporteBN = ReportesBN::with('bn')->get()->map(function ($item) {
            $item->origen = 'bien_nacional';
    
            if ($item->bn) {
                $item->numero_bn_mostrar = $item->bn->numero_bn;
                $item->nombre_bn_mostrar = $item->bn->nombre; // <-- Aquí obtienes el nombre
                $item->fecha_reporte = Carbon::parse($item->fecha_reporte);
            } else {
                $item->numero_bn_mostrar = 'N/A';
                $item->nombre_bn_mostrar = 'Sin nombre';
            }

            return $item;
        });
        $reporteAA = ReportesAA::all()->map(function ($item) {
            $item->origen = 'aire_acondicionado';

            if ($item->airAcond) {
                $item->numero_bn_mostrar = $item->airAcond->numero_bn;
                $item->nombre_bn_mostrar = $item->airAcond->nombre_aa; // <-- Aquí obtienes el nombre
                $item->fecha_reporte = Carbon::parse($item->fecha_reporte);
            } else {
                $item->numero_bn_mostrar = 'N/A';
                $item->nombre_bn_mostrar = 'Sin nombre';
            }
            return $item;
        });

        $reportesCombinados = $reporteBN->concat($reporteAA)
                         ->sortByDesc('fecha_reporte');

        return view('mantenimiento', compact('reporteBN', 'reporteAA', 'reportesCombinados', 'assets'));
    }

    public function storeBN(StoreReportesBNRequest $request)
    {
        $data = $request->validated();
        
        // 1. Buscar el Bien Nacional
        $bien = BN::where('numero_bn', $request->bienes_nacional_id)->first();

        if (!$bien) {
            return response()->json(['message' => 'El número de bien nacional no existe.'], 422);
        }

        // 2. ACTUALIZAR EL ESTADO EN LA TABLA "bienes_nacionales"
        // Tomamos el estado que viene del formulario y lo guardamos en el bien
        $bien->update([
            'estado' => $request->estado
        ]);

        // 3. Preparar los datos para el reporte
        $data['bienes_nacional_id'] = $bien->id;
        $data['usuario_nombre'] = auth()->user()->name;

        // 4. Crear el reporte
        $reporte = ReportesBN::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Reporte registrado y estado del bien actualizado.',
            'data' => $reporte
        ], 201);
    }

    public function storeAA(StoreReportesAARequest $request)
    {
        $data = $request->validated();

        // 1. Buscar el aire acondicionado por su número de etiqueta
        // (Asegúrate de que 'AirAcond' sea el nombre correcto de tu modelo)
        $aire = AirAcond::where('numero_bn', $request->aire_id)->first();

        if (!$aire) {
            return response()->json(['message' => 'El número de aire acondicionado no existe.'], 422);
        }

        // 2. ACTUALIZAR EL ESTADO EN LA TABLA "aires_acondicionados"
        // Esto sincroniza el estado del equipo con el estado del reporte
        $aire->update([
            'estado' => $request->estado_final
        ]);

        // 3. Preparar los datos para el reporte
        // Reemplazamos el valor del input por el ID real y asignamos el usuario
        $data['aire_id'] = $aire->id;
        $data['usuario_nombre'] = auth()->user()->name;

        // 4. Crear el registro del reporte
        $reporte = ReportesAA::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Reporte de Aire Acondicionado registrado y estado del equipo actualizado.',
            'data' => $reporte
        ], 201);
    }
}
