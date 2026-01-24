<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BN;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Count assets with status 'Operativo' - with fallback to 0
        $bienesOperativos = BN::where('estado', 'Operativo')->count();
        $bienesEnReparacion = BN::where('estado', 'En reparación')->count();
        $bienesDanados = BN::where('estado', 'Fuera de servicio')->count();
        $bienesDesincorporados = BN::where('estado', 'Desincorporado')->count();

        // --- Data for Curve Chart (Últimos 6 Meses) ---
        $curveChartData = [['Mes', 'Altas', 'Bajas']];
        
        // Calcular los últimos 6 meses incluyendo el mes actual
        $endDate = \Carbon\Carbon::now()->endOfMonth();
        $startDate = \Carbon\Carbon::now()->subMonths(5)->startOfMonth(); // 5 meses atrás + actual = 6 meses
        
        $currentDate = $startDate->copy();

        while ($currentDate <= $endDate) {
            $monthName = $currentDate->translatedFormat('M Y'); // e.g., "Ene 2024"
            $startOfMonth = $currentDate->copy()->startOfMonth();
            $endOfMonth = $currentDate->copy()->endOfMonth();

            $altas = BN::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $bajas = BN::where('estado', 'Desincorporado')
                       ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
                       ->count();
            
            $curveChartData[] = [$monthName, $altas, $bajas];
            
            $currentDate->addMonth();
        }

        // --- Data for Pie Chart (Distribución por Categoría) ---
        $pieChartData = [['Categoría', 'Cantidad']];
        
        // Check if categoria relationship exists and table has data
        try {
            $catData = BN::with('categoria')
                         ->get()
                         ->groupBy(function($item) {
                             return $item->categoria ? $item->categoria->tipo : 'Sin Categoría';
                         })
                         ->map(function($group) {
                             return $group->count();
                         });
            
            foreach ($catData as $catName => $count) {
                $pieChartData[] = ["$catName ($count)", $count];
            }
        } catch (\Exception $e) {
            // If categorias table doesn't exist or relationship fails, add default data
            $totalBN = BN::count();
            if ($totalBN > 0) {
                $pieChartData[] = ["Bienes Nacionales ($totalBN)", $totalBN];
            }
        }

        // Add Aires Acondicionados to Pie Chart
        $acCount = 0;
        try {
            $acCount = \App\Models\AirAcond::count();
            if ($acCount > 0) {
                $pieChartData[] = ["Aire Acondicionado ($acCount)", $acCount];
            }
        } catch (\Exception $e) {
            // AirAcond table might not exist
            $acCount = 0;
        }

        // AC Stats with error handling
        $acOperativos = 0;
        $acCriticos = 0;
        try {
            $acOperativos = \App\Models\AirAcond::where('estado', 'operativo')->count();
            $acCriticos = \App\Models\AirAcond::whereIn('estado', ['fuera de servicio', 'dañado'])->count();
        } catch (\Exception $e) {
            // Ignore if table doesn't exist
        }

        // Calculate total categorias safely
        $totalCategorias = 0;
        try {
            $totalCategorias = BN::distinct('categoria_id')->count('categoria_id') + ($acCount > 0 ? 1 : 0);
        } catch (\Exception $e) {
            $totalCategorias = ($acCount > 0 ? 1 : 0);
        }

        return view('inicio', [
            'pageTitle' => 'Inicio',
            'bienesOperativos' => $bienesOperativos,
            'bienesEnReparacion' => $bienesEnReparacion,
            'bienesDanados' => $bienesDanados,
            'bienesDesincorporados' => $bienesDesincorporados,
            'curveChartData' => json_encode($curveChartData),
            'pieChartData' => json_encode($pieChartData),
            // AC Stats
            'acTotal' => $acCount,
            'acOperativos' => $acOperativos,
            'acCriticos' => $acCriticos,
            // General Stats
            'totalBienes' => BN::count() + $acCount,
            'totalPendientes' => $bienesEnReparacion + $bienesDanados + $acCriticos,
            'totalCategorias' => $totalCategorias, 
        ]);
    }
}
