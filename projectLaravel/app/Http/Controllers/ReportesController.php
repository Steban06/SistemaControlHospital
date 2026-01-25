<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BN;
use App\Models\AirAcond; // Importar modelo de Aires
use App\Models\Area; // Importar modelo Area

class ReportesController extends Controller
{
    public function index()
    {
        // Conteos basados en el campo 'estado'
        $operativos = BN::where('estado', 'Operativo')->count();
        $mantenimiento = BN::where('estado', 'Mantenimiento')->count();
        $fueraServicio = BN::where('estado', 'Fuera de Servicio')->orWhere('estado', 'Dañado')->count();
        $desincorporados = BN::where('estado', 'Desincorporado')->count();

        // Calcular porcentajes del total
        $total = $operativos + $mantenimiento + $fueraServicio + $desincorporados;
        
        $porcOperativos = $total > 0 ? round(($operativos / $total) * 100, 1) : 0;
        $porcMantenimiento = $total > 0 ? round(($mantenimiento / $total) * 100, 1) : 0;
        $porcFuera = $total > 0 ? round(($fueraServicio / $total) * 100, 1) : 0;
        $porcDesinc = $total > 0 ? round(($desincorporados / $total) * 100, 1) : 0;

        // Datos para tablas de reporte (Últimos 10 registros para vista previa)
        $bienesRecientes = BN::with(['area', 'categoria'])->latest()->take(10)->get();
        $airesRecientes = AirAcond::with('bienNacional.area')->latest()->take(10)->get();

        // Tendencias mensuales (últimos 5 meses) con relleno de ceros
        $meses = collect([]);
        for ($i = 4; $i >= 0; $i--) {
            $date = \Carbon\Carbon::now()->subMonths($i);
            $meses->push([
                'mes_anio' => $date->format('Y-m'),
                'mes_nombre' => $date->format('M'),
                'total' => 0
            ]);
        }

        $datosDB = BN::select(
            \DB::raw('count(id) as total'),
            \DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mes_anio")
        )
        ->where('created_at', '>=', \Carbon\Carbon::now()->subMonths(5)->startOfMonth())
        ->groupBy('mes_anio')
        ->get()
        ->keyBy('mes_anio');

        $tendencias = $meses->map(function ($mes) use ($datosDB) {
            if ($datosDB->has($mes['mes_anio'])) {
                $mes['total'] = $datosDB[$mes['mes_anio']]->total;
            }
            return (object) $mes;
        });

        // Formatear para Google Charts
        $tendenciasChartData = [['Mes', 'Bienes Registrados']];
        foreach ($tendencias as $t) {
            $tendenciasChartData[] = [$t->mes_nombre, (int)$t->total];
        }
        $tendenciasChartData = json_encode($tendenciasChartData);

        // Obtener áreas para filtros
        $areas = Area::orderBy('descripcion', 'asc')->get();

        return view('reportes', compact(
            'operativos', 
            'mantenimiento', 
            'fueraServicio', 
            'desincorporados',
            'porcOperativos',
            'porcMantenimiento',
            'porcFuera',
            'porcDesinc',
            'bienesRecientes',
            'airesRecientes',
            'tendencias', // Mantener por si acaso o eliminar si ya no se usa
            'tendenciasChartData',
            'areas'
        ));
    }

    public function generarReportePersonalizado(Request $request)
    {
        $tipo = $request->input('tipo');
        $areaId = $request->input('area');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        
        $pdf = null;
        $filename = "reporte_{$tipo}_personalizado.pdf";

        // Query Base según tipo
        if ($tipo === 'general' || $tipo === 'mantenimiento') {
            $query = BN::with(['area', 'categoria']);
            
            if ($tipo === 'mantenimiento') {
                $query->where('estado', 'Mantenimiento');
            }
        } elseif ($tipo === 'aires') {
            $query = AirAcond::with('bienNacional.area');
        } else {
            return back()->with('error', 'Tipo de reporte analítico no soportado en modo personalizado aún.');
        }

        // Filtros
        if ($areaId && $areaId !== 'todos') {
            if ($tipo === 'aires') {
                $query->whereHas('bienNacional', function($q) use ($areaId) {
                    $q->where('area_id', $areaId);
                });
            } else {
                $query->where('area_id', $areaId);
            }
        }

        if ($fechaInicio) {
            $query->whereDate('created_at', '>=', $fechaInicio);
        }
        if ($fechaFin) {
            $query->whereDate('created_at', '<=', $fechaFin);
        }

        // Obtener resultados
        $data = $query->orderBy('created_at', 'desc')->get();

        // Generar PDF usando las vistas existentes
        if ($tipo === 'general' || $tipo === 'mantenimiento') {
            // Reutilizamos la vista general, pasando los bienes filtrados
            // Si es mantenimiento, la vista general mostrará solo esos
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.general', ['bienes' => $data]);
            $pdf->setPaper('a4', 'landscape');
        } elseif ($tipo === 'aires') {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.aires', ['aires' => $data]);
            $pdf->setPaper('a4', 'landscape');
        }

        return $pdf->download($filename);
    }

    public function reporteGeneral()
    {
        $bienes = BN::with(['area', 'categoria'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reportes.general', compact('bienes'));
    }

    public function reporteAires()
    {
        $aires = AirAcond::with('bienNacional.area')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reportes.aires', compact('aires'));
    }

    public function reporteAnalitico()
    {
        // Estadísticas por estado
        $estadoPorcentajes = [
            'Operativo' => BN::where('estado', 'Operativo')->count(),
            'Mantenimiento' => BN::where('estado', 'Mantenimiento')->count(),
            'Fuera de Servicio' => BN::where('estado', 'Fuera de Servicio')->orWhere('estado', 'Dañado')->count(),
            'Desincorporado' => BN::where('estado', 'Desincorporado')->count(),
        ];

        // Bienes por área (top 5)
        $bienesPorArea = BN::select('area_id', \DB::raw('count(*) as total'))
            ->with('area')
            ->groupBy('area_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return view('reportes.analitico', compact('estadoPorcentajes', 'bienesPorArea'));
    }

    public function generarPDF($tipo)
    {
        $pdf = null;
        $filename = '';

        switch($tipo) {
            case 'general':
                $bienes = BN::with(['area', 'categoria'])->orderBy('created_at', 'desc')->get();
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.general', compact('bienes'));
                $filename = 'reporte_general_' . date('Y-m-d') . '.pdf';
                break;

            case 'aires':
                $aires = AirAcond::with('bienNacional.area')->orderBy('created_at', 'desc')->get();
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.aires', compact('aires'));
                $filename = 'reporte_aires_' . date('Y-m-d') . '.pdf';
                break;

            case 'analitico':
                $estadoPorcentajes = [
                    'Operativo' => BN::where('estado', 'Operativo')->count(),
                    'Mantenimiento' => BN::where('estado', 'Mantenimiento')->count(),
                    'Fuera de Servicio' => BN::where('estado', 'Fuera de Servicio')->orWhere('estado', 'Dañado')->count(),
                    'Desincorporado' => BN::where('estado', 'Desincorporado')->count(),
                ];

                $bienesPorArea = BN::select('area_id', \DB::raw('count(*) as total'))
                    ->with('area')
                    ->groupBy('area_id')
                    ->orderBy('total', 'desc')
                    ->limit(5)
                    ->get();

                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.analitico', compact('estadoPorcentajes', 'bienesPorArea'));
                $filename = 'reporte_analitico_' . date('Y-m-d') . '.pdf';
                break;

            default:
                return response()->json(['error' => 'Tipo de reporte no válido'], 400);
        }

        // Configurar orientación según el tipo
        if($tipo === 'general' || $tipo === 'aires') {
            $pdf->setPaper('a4', 'landscape'); // Horizontal para tablas anchas
        } else {
            $pdf->setPaper('a4', 'portrait'); // Vertical para analítico
        }

        return $pdf->download($filename);
    }
}
