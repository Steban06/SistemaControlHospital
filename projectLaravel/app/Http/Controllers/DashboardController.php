<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BN;

class DashboardController extends Controller
{
    public function index()
    {
        // Count assets with status 'Operativo'
        $bienesOperativos = BN::where('estado', 'Operativo')->count();
        $bienesEnReparacion = BN::where('estado', 'En reparación')->count();
        $bienesDanados = BN::where('estado', 'Dañado')->count();
        $bienesDesincorporados = BN::where('estado', 'Desincorporado')->count();

        // --- Data for Curve Chart (Tendencias Mensuales - Last 6 Months) ---
        $curveChartData = [['Mes', 'Altas', 'Bajas']];
        for ($i = 5; $i >= 0; $i--) {
            $date = \Carbon\Carbon::now()->subMonths($i);
            $monthName = $date->translatedFormat('M'); // 'Ene', 'Feb', etc. (Needs spanish locale properly set ideally, or manually mapped)
            $startOfMonth = $date->copy()->startOfMonth();
            $endOfMonth = $date->copy()->endOfMonth();

            $altas = BN::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            // Approximating 'Bajas' as desincorporados updated in that month
            $bajas = BN::where('estado', 'Desincorporado')
                       ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
                       ->count();
            
            $curveChartData[] = [$monthName, $altas, $bajas];
        }

        // --- Data for Pie Chart (Distribución por Categoría) ---
        // Assuming relationship 'categoria' exists on BN model
        $catData = BN::with('categoria')
                     ->get()
                     ->groupBy(function($item) {
                         return $item->categoria ? $item->categoria->tipo : 'Sin Categoría';
                     })
                     ->map(function($group) {
                         return $group->count();
                     });
        
        $pieChartData = [['Categoría', 'Cantidad']];
        foreach ($catData as $catName => $count) {
            $pieChartData[] = ["$catName ($count)", $count];
        }

        return view('inicio', [
            'pageTitle' => 'Inicio',
            'bienesOperativos' => $bienesOperativos,
            'bienesEnReparacion' => $bienesEnReparacion,
            'bienesDanados' => $bienesDanados,
            'bienesDesincorporados' => $bienesDesincorporados,
            'curveChartData' => json_encode($curveChartData),
            'pieChartData' => json_encode($pieChartData)
        ]);
    }
}
