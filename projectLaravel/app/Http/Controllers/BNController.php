<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBNRequest;
use App\Http\Requests\UpdateBNRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BN;
use App\Models\Categoria;
use App\Models\Area;
use App\Models\ReportesBN;
use App\Services\NotificationService;

class BNController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $bienesNacionales = BN::with(['categoria', 'area'])->get();
        $areas = Area::all();
        $categorias = Categoria::all();

        // Calcular estadísticas de Aires Acondicionados dentro de Bienes Nacionales
        $acBienes = $bienesNacionales->filter(function ($bien) {
            return $bien->categoria && (
                stripos($bien->categoria->tipo, 'aire') !== false || 
                stripos($bien->categoria->tipo, 'acondicionado') !== false
            );
        });

        $acStats = [
            'total' => $acBienes->count(),
            'operativo' => $acBienes->where('estado', 'Operativo')->count(), // Ajustar según los valores reales en BD (Case sensitive?)
            'dañado' => $acBienes->whereIn('estado', ['Dañado', 'Fuera de servicio'])->count(),
            'reparacion' => $acBienes->where('estado', 'En reparación')->count(),
            'desincorporado' => $acBienes->where('estado', 'Desincorporado')->count(),
        ];

        return view('bienes-nacionales', ['pageTitle' => 'Gestión Bienes Nacionales'], compact('bienesNacionales', 'areas', 'categorias', 'acStats'));
    }

    public function store(StoreBNRequest $request)
    {
        if (auth()->user()->role === 'guest') {
             return response()->json(['success' => false, 'message' => 'No tiene permisos para realizar esta acción.'], 403);
        }
        // Validar los datos recibidos con FormRequest
        $bien = BN::create($request->validated());

        // Enviar notificación a todos los usuarios configurados
        $this->notificationService->notifyNewAsset($bien, auth()->user());

        return response()->json([
            'success' => true,
            'message' => 'Bien nacional agregado exitosamente.',
            'data' => $bien
        ], 201);
    }

    public function update(UpdateBNRequest $request, $id)
    {
        if (auth()->user()->role === 'guest') {
             return response()->json(['success' => false, 'message' => 'No tiene permisos para realizar esta acción.'], 403);
        }
        try {
            $bien = BN::findOrFail($id);

            $bien->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Bien nacional actualizado correctamente.',
                'data' => $bien
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el bien nacional.' . $e->getMessage()
            ], 500);
        }
    }

    public function history($id)
    {
        // Lógica para obtener el historial del bien nacional
        // Traer historial de forma normal
        // $historial = ReportesBN::where('bienes_nacional_id', $id)->get();

        // Traer historial de forma descendente, es decir del ultimo al primero
        $historial = ReportesBN::where('bienes_nacional_id', $id)
            ->orderBy('id', 'desc')
            ->get();
                
        return response()->json([
            'success' => true,
            'message' => 'Historial del bien nacional obtenido correctamente.',
            'history' => $historial
        ], 200);
    }

    public function downloadHistoryPDF(Request $request, $id)
    {
        $bien = BN::with(['area', 'categoria'])->findOrFail($id);
        
        $query = ReportesBN::where('bienes_nacional_id', $id);

        // Aplicar filtros
        if ($request->filled('desde')) {
            $query->whereDate('fecha_reporte', '>=', $request->input('desde'));
        }
        if ($request->filled('hasta')) {
            $query->whereDate('fecha_reporte', '<=', $request->input('hasta'));
        }
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->input('tipo'));
        }

        $historial = $query->orderBy('fecha_reporte', 'desc')->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.historial', compact('bien', 'historial'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download("historial_{$bien->numero_bn}.pdf");
    }

    public function downloadPDF($id)
    {
        $bien = BN::with(['area', 'categoria'])->findOrFail($id);
        
        // Generar QR en base64 para incrustar en el PDF
        $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size(100)->generate($bien->numero_bn);
        $qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrCode);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reportes.pdf.detalle-bien', compact('bien', 'qrCodeBase64'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download("detalle_bien_{$bien->numero_bn}.pdf");
    }

    public function generateQR($id)
    {
        $bien = BN::findOrFail($id);
        $qr = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($bien->numero_bn);
        return response($qr)->header('Content-Type', 'image/svg+xml');
    }
}