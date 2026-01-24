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

        // Datos de ejemplo para la lista
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
            (object)[
                'id' => 2,
                'codigo_bien' => 'BN-2023-0156',
                'nombre_bien' => 'Monitor LG 27"',
                'tipo' => 'correctivo',
                'fecha_realizada' => '2026-01-14',
                'tecnico' => 'María González',
                'costo' => 120.00
            ],
            (object)[
                'id' => 3,
                'codigo_bien' => 'BN-2024-0045',
                'nombre_bien' => 'Equipo de Ultrasonido',
                'tipo' => 'preventivo',
                'fecha_realizada' => '2026-01-09',
                'tecnico' => 'Carlos Ruiz',
                'costo' => 450.00
            ],
            (object)[
                'id' => 4,
                'codigo_bien' => 'BN-2022-0089',
                'nombre_bien' => 'Impresora HP LaserJet',
                'tipo' => 'correctivo',
                'fecha_realizada' => '2026-01-07',
                'tecnico' => 'Luis Martínez',
                'costo' => null
            ],
        ];

        return view('mantenimiento', compact(
            'totalMantenimientos',
            'preventivos',
            'correctivos',
            'esteMes',
            'mantenimientos'
        ));
    }
}
