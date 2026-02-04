<?php

namespace App\Http\Controllers;

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
        $bienes = \App\Models\BN::all()->map(function($item) {
            return (object)[
                'id' => $item->id,
                'name' => $item->nombre,
                'code' => $item->numero_bn,
                'type' => 'Bien Nacional',
                'raw_type' => 'App\Models\BN' // Para polimorfismo si lo usas
            ];
        });

        $aires = \App\Models\AirAcond::all()->map(function($item) {
            return (object)[
                'id' => $item->id,
                'name' => $item->nombre_aa,
                'code' => $item->numero_bn,
                'type' => 'Aire Acondicionado',
                'raw_type' => 'App\Models\AirAcond'
            ];
        });

        $assets = $bienes->concat($aires)->sortBy('name')->values();

        // // Datos de ejemplo para la lista
        // $mantenimientos = [
        //     (object)[
        //         'id' => 1,
        //         'codigo_bien' => 'BN-2024-0001',
        //         'nombre_bien' => 'Computadora Dell OptiPlex 7090',
        //         'tipo' => 'preventivo',
        //         'fecha_realizada' => '2026-01-19',
        //         'tecnico' => 'Juan Pérez',
        //         'costo' => 150.00
        //     ],
        // ];

        // return view('mantenimiento', compact(
        //     'totalMantenimientos',
        //     'preventivos',
        //     'correctivos',
        //     'esteMes',
        //     'mantenimientos',
        //     'assets'
        // ));

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
            return $item;
        });

        $reportesCombinados = $reporteBN->concat($reporteAA)
                         ->sortByDesc('fecha_reporte');

        return view('mantenimiento', compact('reporteBN', 'reporteAA', 'reportesCombinados', 'assets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_id' => 'required', // ID del activo
            'asset_type' => 'required', // 'App\Models\BN' o 'App\Models\AirAcond' (o manejar lógica manual)
            'tipo' => 'required|in:preventivo,correctivo',
            'fecha_realizada' => 'required|date',
            'descripcion' => 'required|string',
            'costo' => 'nullable|numeric',
            'tecnico' => 'required|string',
        ]);

        // Crear el mantenimiento
        // NOTA: Ajusta 'asset_type' y 'asset_id' según tu esquema real de BD (polimórfico o columnas separadas)
        // Asumo un diseño simple o polimórfico por ahora.
        $maintenance = Maintenance::create([
            'asset_id' => $request->asset_id,
            'asset_type' => $request->asset_type, // Asegúrate de enviar esto desde el formulario
            'tipo' => $request->tipo,
            'fecha_realizada' => $request->fecha_realizada,
            'descripcion' => $request->descripcion,
            'costo' => $request->costo,
            'tecnico' => $request->tecnico,
            'user_id' => auth()->id(), // Usuario que registra
        ]);

        // Enviar notificación
        $this->notificationService->notifyMaintenance($maintenance, auth()->user());

        return redirect()->back()->with('success', 'Mantenimiento registrado correctamente');
    }
}
