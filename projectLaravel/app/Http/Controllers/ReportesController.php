<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BN;
use App\Models\AirAcond; // Importar modelo de Aires
use App\Models\Area; // Importar modelo Area
use App\Models\ReportesBN; // Importar modelo ReportesBN
use App\Models\ReportesAA; // Importar modelo ReportesAA
use App\Models\Notification;
use App\Models\UserPreference;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    public function index()
    {
        // Conteos basados en el campo 'estado'
        // BN que no son Aires (evitar doble conteo) + Aires Acondicionados (que pueden tener estado más actualizado)
        
        $operativos = BN::doesntHave('airAcond')->where('estado', 'Operativo')->count() 
                    + AirAcond::whereIn('estado', ['Operativo', 'operativo'])->count();

        $mantenimiento = BN::doesntHave('airAcond')->where('estado', 'Mantenimiento')->count()
                       + AirAcond::whereIn('estado', ['Mantenimiento', 'mantenimiento'])->count();

        $fueraServicio = BN::doesntHave('airAcond')->where(function($q) {
                            $q->where('estado', 'Fuera de Servicio')->orWhere('estado', 'Dañado');
                        })->count()
                       + AirAcond::where(function($q) {
                            $q->whereIn('estado', ['Fuera de Servicio', 'fuera de servicio', 'Dañado', 'dañado']);
                       })->count();

        $desincorporados = BN::doesntHave('airAcond')->where('estado', 'Desincorporado')->count()
                         + AirAcond::whereIn('estado', ['Desincorporado', 'desincorporado'])->count();

        // Calcular porcentajes del total
        $total = $operativos + $mantenimiento + $fueraServicio + $desincorporados;
        
        $porcOperativos = $total > 0 ? round(($operativos / $total) * 100, 1) : 0;
        $porcMantenimiento = $total > 0 ? round(($mantenimiento / $total) * 100, 1) : 0;
        $porcFuera = $total > 0 ? round(($fueraServicio / $total) * 100, 1) : 0;
        $porcDesinc = $total > 0 ? round(($desincorporados / $total) * 100, 1) : 0;

        // Datos para tablas de reporte (Últimos 10 registros para vista previa)
        $bienesRecientes = BN::with(['area', 'categoria'])->latest()->take(10)->get();
        $airesRecientes = AirAcond::with('bienNacional.area')->latest()->take(10)->get();

        // --- LÓGICA DE MANTENIMIENTOS RECIENTES ---
        $mantBN = ReportesBN::with(['bn.area'])->latest()->take(10)->get()->map(function($item) {
            return (object) [
                'origen' => 'bn',
                'titulo' => $item->titulo ?? ($item->bn->nombre ?? 'Equipo Desconocido'),
                'equipo' => $item->bn->nombre ?? 'Desconocido',
                'ubicacion' => $item->bn->area->nombre ?? 'Sin Asignar',
                'descripcion' => $item->descripcion,
                'fecha' => $item->created_at,
                'tipo' => $item->tipo ?? 'Mantenimiento',
                'estado' => $item->estado ?? 'Pendiente',
                'id' => $item->id
            ];
        });

        $mantAA = ReportesAA::with(['airAcond.bienNacional.area'])->latest('fecha_reporte')->take(10)->get()->map(function($item) {
             // Determinar estado/tipo basado en descripción o default
             $tipo = stripos($item->trabajo_realizado, 'preventivo') !== false ? 'Preventivo' : 'Correctivo';
             
             return (object) [
                'origen' => 'aa',
                'titulo' => 'Mantenimiento AA - ' . ($item->airAcond->modelo ?? 'N/A'),
                'equipo' => $item->airAcond->nombre_aa ?? 'Aire Acondicionado',
                'ubicacion' => $item->airAcond->bienNacional->area->nombre ?? 'N/A',
                'descripcion' => $item->trabajo_realizado,
                'fecha' => \Carbon\Carbon::parse($item->fecha_reporte),
                'tipo' => $tipo,
                'estado' => 'Completado', // Asumimos completado si hay reporte
                'id' => $item->id
            ];
        });

        // Fusionar y ordenar
        $mantenimientosRecientes = $mantBN->concat($mantAA)->sortByDesc('fecha')->take(6);
        // -------------------------------------------

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
            'mantenimientosRecientes', // Nueva variable
            'tendencias', 
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
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.general', ['bienes' => $data, 'user' => Auth::user()]);
            $pdf->setPaper('a4', 'landscape');
        } elseif ($tipo === 'aires') {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.aires', ['aires' => $data, 'user' => Auth::user()]);
            $pdf->setPaper('a4', 'landscape');
        }

        // Create notification if user has notify_reports enabled
        $this->createReportNotification($tipo, $filename);

        return $pdf->download($filename);
    }

    /**
     * Create a notification for report generation if user preferences allow it
     */
    private function createReportNotification($tipo, $filename)
    {
        $currentUserId = Auth::id();
        $currentUser = Auth::user();
        
        $tipoNombre = match($tipo) {
            'general' => 'General',
            'aires' => 'Aires Acondicionados',
            'mantenimiento' => 'Mantenimiento',
            'analitico' => 'Analítico',
            default => ucfirst($tipo)
        };

        // Get all users who should receive this notification
        $usersToNotify = collect();
        
        // 1. Add current user if they have notify_reports enabled
        $currentUserPreference = UserPreference::where('user_id', $currentUserId)->first();
        if ($currentUserPreference && $currentUserPreference->notify_reports) {
            $usersToNotify->push([
                'user_id' => $currentUserId,
                'message' => "Has generado el reporte de {$tipoNombre} ({$filename}) exitosamente."
            ]);
        }
        
        // 2. Add all administrators who have notify_reports enabled
        $admins = \App\Models\User::where('role', 'admin')
            ->where('id', '!=', $currentUserId) // Exclude current user if they're admin
            ->get();
        
        foreach ($admins as $admin) {
            $adminPreference = UserPreference::where('user_id', $admin->id)->first();
            if ($adminPreference && $adminPreference->notify_reports) {
                $usersToNotify->push([
                    'user_id' => $admin->id,
                    'message' => "{$currentUser->name} ha generado el reporte de {$tipoNombre} ({$filename})."
                ]);
            }
        }
        
        // Create notifications for all users
        foreach ($usersToNotify as $notificationData) {
            Notification::create([
                'user_id' => $notificationData['user_id'],
                'type' => 'reports',
                'title' => 'Reporte Generado',
                'message' => $notificationData['message'],
                'is_read' => false,
            ]);
        }
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

    public function reporteMantenimiento()
    {
        // Obtener todos para el reporte completo
        $mantBN = ReportesBN::with(['bn.area'])->orderBy('created_at', 'desc')->get()->map(function($item) {
            return (object) [
                'origen' => 'bn',
                'titulo' => $item->titulo ?? ($item->bn->nombre ?? 'Equipo Desconocido'),
                'equipo' => $item->bn->nombre ?? 'Desconocido',
                'ubicacion' => $item->bn->area->nombre ?? 'Sin Asignar',
                'descripcion' => $item->descripcion,
                'fecha' => $item->created_at,
                'tipo' => $item->tipo ?? 'Mantenimiento',
                'estado' => $item->estado ?? 'Pendiente',
                'id' => $item->id
            ];
        });

        $mantAA = ReportesAA::with(['airAcond.bienNacional.area'])->orderBy('fecha_reporte', 'desc')->get()->map(function($item) {
             $tipo = stripos($item->trabajo_realizado, 'preventivo') !== false ? 'Preventivo' : 'Correctivo';
             return (object) [
                'origen' => 'aa',
                'titulo' => 'Mantenimiento AA - ' . ($item->airAcond->modelo ?? 'N/A'),
                'equipo' => $item->airAcond->nombre_aa ?? 'Aire Acondicionado',
                'ubicacion' => $item->airAcond->bienNacional->area->nombre ?? 'N/A',
                'descripcion' => $item->trabajo_realizado,
                'fecha' => \Carbon\Carbon::parse($item->fecha_reporte),
                'tipo' => $tipo,
                'estado' => 'Completado',
                'id' => $item->id
            ];
        });

        // Fusionar y ordenar
        $mantenimientos = $mantBN->concat($mantAA)->sortByDesc('fecha');

        return view('reportes.mantenimiento', compact('mantenimientos'));
    }

    public function reporteAnalitico()
    {
        // Estadísticas por estado
        $estadoPorcentajes = [
            'Operativo' => BN::doesntHave('airAcond')->where('estado', 'Operativo')->count() 
                         + AirAcond::whereIn('estado', ['Operativo', 'operativo'])->count(),
            
            'Mantenimiento' => BN::doesntHave('airAcond')->where('estado', 'Mantenimiento')->count()
                             + AirAcond::whereIn('estado', ['Mantenimiento', 'mantenimiento'])->count(),
            
            'Fuera de Servicio' => BN::doesntHave('airAcond')->where(function($q) {
                                    $q->where('estado', 'Fuera de Servicio')->orWhere('estado', 'Dañado');
                                })->count()
                               + AirAcond::where(function($q) {
                                    $q->whereIn('estado', ['Fuera de Servicio', 'fuera de servicio', 'Dañado', 'dañado']);
                               })->count(),
            
            'Desincorporado' => BN::doesntHave('airAcond')->where('estado', 'Desincorporado')->count()
                              + AirAcond::whereIn('estado', ['Desincorporado', 'desincorporado'])->count(),
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
                $user = Auth::user();
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.general', compact('bienes', 'user'));
                $filename = 'reporte_general_' . date('Y-m-d') . '.pdf';
                break;

            case 'aires':
                $aires = AirAcond::with('bienNacional.area')->orderBy('created_at', 'desc')->get();
                $user = Auth::user();
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.aires', compact('aires', 'user'));
                $filename = 'reporte_aires_' . date('Y-m-d') . '.pdf';
                break;

            case 'mantenimiento':
                // Obtener datos unificados (BN + AA)
                $mantBN = ReportesBN::with(['bn.area'])->orderBy('created_at', 'desc')->get()->map(function($item) {
                    return (object) [
                        'titulo' => $item->bn->nombre ?? 'Equipo Desconocido',
                        'ubicacion' => $item->bn->area->nombre ?? 'Sin Asignar',
                        'descripcion' => $item->descripcion,
                        'fecha' => $item->created_at,
                        'tipo' => $item->tipo ?? 'Mantenimiento'
                    ];
                });

                $mantAA = ReportesAA::with(['airAcond.bienNacional.area'])->orderBy('fecha_reporte', 'desc')->get()->map(function($item) {
                    $tipo = stripos($item->trabajo_realizado, 'preventivo') !== false ? 'Preventivo' : 'Correctivo';
                    return (object) [
                        'titulo' => $item->airAcond->nombre_aa ?? 'Aire Acondicionado',
                        'ubicacion' => $item->airAcond->bienNacional->area->nombre ?? 'N/A',
                        'descripcion' => $item->trabajo_realizado,
                        'fecha' => \Carbon\Carbon::parse($item->fecha_reporte),
                        'tipo' => $tipo
                    ];
                });

                $mantenimientos = $mantBN->concat($mantAA)->sortByDesc('fecha');
                $user = Auth::user();
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.mantenimiento', compact('mantenimientos', 'user'));
                $filename = 'reporte_mantenimiento_' . date('Y-m-d') . '.pdf';
                break;

            case 'analitico':
                $estadoPorcentajes = [
                    'Operativo' => BN::doesntHave('airAcond')->where('estado', 'Operativo')->count() 
                                 + AirAcond::whereIn('estado', ['Operativo', 'operativo'])->count(),
                    
                    'Mantenimiento' => BN::doesntHave('airAcond')->where('estado', 'Mantenimiento')->count()
                                     + AirAcond::whereIn('estado', ['Mantenimiento', 'mantenimiento'])->count(),
                    
                    'Fuera de Servicio' => BN::doesntHave('airAcond')->where(function($q) {
                                            $q->where('estado', 'Fuera de Servicio')->orWhere('estado', 'Dañado');
                                        })->count()
                                       + AirAcond::where(function($q) {
                                            $q->whereIn('estado', ['Fuera de Servicio', 'fuera de servicio', 'Dañado', 'dañado']);
                                       })->count(),
                    
                    'Desincorporado' => BN::doesntHave('airAcond')->where('estado', 'Desincorporado')->count()
                                      + AirAcond::whereIn('estado', ['Desincorporado', 'desincorporado'])->count(),
                ];

                $bienesPorArea = BN::select('area_id', \DB::raw('count(*) as total'))
                    ->with('area')
                    ->groupBy('area_id')
                    ->orderBy('total', 'desc')
                    ->limit(5)
                    ->get();

                $user = Auth::user();
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.analitico', compact('estadoPorcentajes', 'bienesPorArea', 'user'));
                $filename = 'reporte_analitico_' . date('Y-m-d') . '.pdf';
                break;

            default:
                return response()->json(['error' => 'Tipo de reporte no válido'], 400);
        }

        // Configurar orientación según el tipo
        if($tipo === 'general' || $tipo === 'aires' || $tipo === 'mantenimiento') {
            $pdf->setPaper('a4', 'landscape'); // Horizontal para tablas anchas
        } else {
            $pdf->setPaper('a4', 'portrait'); // Vertical para analítico
        }

        return $pdf->download($filename);
    }
}
