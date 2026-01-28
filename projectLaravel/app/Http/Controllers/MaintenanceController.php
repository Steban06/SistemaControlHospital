<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        // Datos estáticos para demostración
        $totalMantenimientos = 12;
        $preventivos = 8;
        $correctivos = 4;
        $esteMes = 3;

        // Fetch assets
        $bienes = \App\Models\BN::all()->map(function($item) {
            return (object)[
                'id' => $item->id,
                'name' => $item->nombre,
                'code' => $item->numero_bn,
                'type' => 'Bien Nacional'
            ];
        });

        $aires = \App\Models\AirAcond::all()->map(function($item) {
            return (object)[
                'id' => $item->id,
                'name' => $item->nombre_aa,
                'code' => $item->numero_bn,
                'type' => 'Aire Acondicionado'
            ];
        });

        $assets = $bienes->concat($aires)->sortBy('name')->values();

        // Datos de ejemplo para la lista (Mantener por ahora)
        $mantenimientos = [
            (object)[
                'id' => 1,
                'codigo_bien' => 'BN-2024-0001',
                'nombre_bien' => 'Computadora Dell OptiPlex 7090',
                'tipo' => 'preventivo',
                'fecha_realizada' => '2026-01-19',
                'tecnico' => 'Juan Pérez',
                'costo' => 150.00
            ],
            // ... (keep logic if needed, or just keep minimal example)
        ];

        return view('mantenimiento', compact(
            'totalMantenimientos',
            'preventivos',
            'correctivos',
            'esteMes',
            'mantenimientos',
            'assets'
        ));
    }
}
