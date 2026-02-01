<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BN;
use App\Models\AirAcond;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;

class ExcelExportController extends Controller
{
    public function exportarExcel(Request $request)
    {
        $tipo = $request->input('tipo');
        $areaId = $request->input('area');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        
        // Nombre de archivo mejorado con tipo y abreviación del hospital
        $tipoNombre = match($tipo) {
            'aires' => 'AC',
            'mantenimiento' => 'Mantenimiento',
            default => 'General'
        };
        
        $filename = "HVV_Reporte_{$tipoNombre}_" . date('Y-m-d') . ".xlsx";

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

        // Aplicar filtros
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

        // Crear Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Título del reporte según tipo
        $tituloReporte = match($tipo) {
            'aires' => 'REPORTE DE AIRES ACONDICIONADOS',
            'mantenimiento' => 'REPORTE DE MANTENIMIENTO',
            default => 'REPORTE GENERAL DE INVENTARIO'
        };

        // LOGO DEL HOSPITAL (PNG)
        $logoPath = public_path('images/logo-hospital.png');
        
        if (file_exists($logoPath)) {
            try {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Logo Hospital');
                $drawing->setDescription('Hospital Virgen del Valle');
                $drawing->setPath($logoPath);
                $drawing->setHeight(40);  // Altura del logo
                $drawing->setCoordinates('A1');
                
                // Centrar el logo en la celda A1
                // Ancho de celda A por defecto: ~64 píxeles
                // Altura de fila 1: 50 píxeles
                // Logo: ~30px ancho (proporcional a altura 40px)
                $cellWidth = 64;
                $cellHeight = 50;
                $logoWidth = 30;  // Aproximado basado en la proporción del logo
                $logoHeight = 40;
                
                // Calcular offsets para centrar
                $offsetX = ($cellWidth - $logoWidth) / 2;
                $offsetY = ($cellHeight - $logoHeight) / 2;
                
                $drawing->setOffsetX((int)$offsetX);
                $drawing->setOffsetY((int)$offsetY);
                
                $drawing->setWorksheet($sheet);
                
                \Log::info('Logo cargado exitosamente: ' . $logoPath);
            } catch (\Exception $e) {
                \Log::error('Error al cargar logo: ' . $e->getMessage());
                // Continuar sin el logo si falla
            }
        } else {
            \Log::warning('Logo no encontrado en: ' . $logoPath);
        }

        // ENCABEZADO INSTITUCIONAL
        // Fila 1: Nombre del hospital (ajustado para dar espacio al logo)
        $sheet->mergeCells('B1:H1');
        $sheet->setCellValue('B1', 'HOSPITAL VIRGEN DEL VALLE');
        $sheet->getStyle('B1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 18,
                'color' => ['rgb' => '0d9488']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'f0fdfa']  // Fondo verde muy claro
            ]
        ]);
        $sheet->getRowDimension(1)->setRowHeight(50);  // Altura aumentada para el logo

        // Subtítulo
        $sheet->mergeCells('A2:H2');
        $sheet->setCellValue('A2', 'Sistema de Gestión de Bienes Nacionales');
        $sheet->getStyle('A2')->applyFromArray([
            'font' => [
                'size' => 11,
                'italic' => true,
                'color' => ['rgb' => '64748b']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'f8fafc']
            ]
        ]);

        // Título del reporte
        $sheet->mergeCells('A3:H3');
        $sheet->setCellValue('A3', $tituloReporte);
        $sheet->getStyle('A3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0d9488']  // Fondo verde teal
            ]
        ]);
        $sheet->getRowDimension(3)->setRowHeight(25);

        // Información de filtros
        $infoFiltros = 'Generado el: ' . date('d/m/Y H:i');
        if ($fechaInicio || $fechaFin) {
            $infoFiltros .= ' | Período: ';
            $infoFiltros .= $fechaInicio ? date('d/m/Y', strtotime($fechaInicio)) : 'Inicio';
            $infoFiltros .= ' - ';
            $infoFiltros .= $fechaFin ? date('d/m/Y', strtotime($fechaFin)) : 'Actual';
        }
        
        $sheet->mergeCells('A4:H4');
        $sheet->setCellValue('A4', $infoFiltros);
        $sheet->getStyle('A4')->applyFromArray([
            'font' => [
                'size' => 9,
                'italic' => true,
                'color' => ['rgb' => '64748b']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ]
        ]);

        // Línea separadora
        $sheet->getRowDimension(5)->setRowHeight(5);

        // ENCABEZADOS DE TABLA (Fila 6)
        $startRow = 6;
        
        if ($tipo === 'aires') {
            $headers = ['Código BN', 'Ubicación', 'Modelo', 'Capacidad', 'Estado', 'Fecha Registro'];
            $columnWidths = [15, 25, 20, 15, 15, 15];
        } else {
            $headers = ['Código BN', 'Nombre', 'Marca', 'Modelo', 'Estado', 'Ubicación', 'Categoría', 'Fecha Registro'];
            $columnWidths = [15, 30, 15, 15, 15, 20, 18, 15];
        }

        // Escribir encabezados
        $col = 'A';
        foreach ($headers as $index => $header) {
            $sheet->setCellValue($col . $startRow, $header);
            $sheet->getColumnDimension($col)->setWidth($columnWidths[$index]);
            $col++;
        }

        // Estilo de encabezados
        $lastCol = chr(64 + count($headers));
        $sheet->getStyle('A' . $startRow . ':' . $lastCol . $startRow)->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0d9488']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '0d9488']
                ]
            ]
        ]);
        $sheet->getRowDimension($startRow)->setRowHeight(20);

        // DATOS
        $row = $startRow + 1;
        
        if ($tipo === 'aires') {
            foreach ($data as $aire) {
                $sheet->setCellValue('A' . $row, $aire->bienNacional->numero_bn ?? 'N/A');
                $sheet->setCellValue('B' . $row, $aire->bienNacional->area->nombre ?? 'N/A');
                $sheet->setCellValue('C' . $row, $aire->modelo ?? 'N/A');
                $sheet->setCellValue('D' . $row, $aire->capacidad ?? 'N/A');
                $sheet->setCellValue('E' . $row, $aire->estado ?? 'N/A');
                $sheet->setCellValue('F' . $row, $aire->created_at ? $aire->created_at->format('d/m/Y') : 'N/A');
                $row++;
            }
        } else {
            foreach ($data as $bien) {
                $sheet->setCellValue('A' . $row, $bien->numero_bn ?? 'N/A');
                $sheet->setCellValue('B' . $row, $bien->nombre ?? 'N/A');
                $sheet->setCellValue('C' . $row, $bien->marca ?? 'N/A');
                $sheet->setCellValue('D' . $row, $bien->modelo ?? 'N/A');
                $sheet->setCellValue('E' . $row, $bien->estado ?? 'N/A');
                $sheet->setCellValue('F' . $row, $bien->area->nombre ?? 'Sin Asignar');
                $sheet->setCellValue('G' . $row, $bien->categoria->nombre ?? 'Sin Categoría');
                $sheet->setCellValue('H' . $row, $bien->created_at ? $bien->created_at->format('d/m/Y') : 'N/A');
                $row++;
            }
        }

        // Estilo de datos (bordes y alineación)
        $lastRow = $row - 1;
        if ($lastRow >= $startRow + 1) {
            $sheet->getStyle('A' . ($startRow + 1) . ':' . $lastCol . $lastRow)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'cbd5e1']
                    ]
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                    'wrapText' => true  // Activar ajuste de texto
                ]
            ]);

            // Alternar colores de filas
            for ($i = $startRow + 1; $i <= $lastRow; $i++) {
                if (($i - $startRow) % 2 == 0) {
                    $sheet->getStyle('A' . $i . ':' . $lastCol . $i)->applyFromArray([
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'f8fafc']
                        ]
                    ]);
                }
                // Ajustar altura de fila automáticamente
                $sheet->getRowDimension($i)->setRowHeight(-1);
            }
        }

        // Pie de página
        $footerRow = $lastRow + 2;
        $sheet->mergeCells('A' . $footerRow . ':' . $lastCol . $footerRow);
        $sheet->setCellValue('A' . $footerRow, 'Total de registros: ' . $data->count());
        $sheet->getStyle('A' . $footerRow)->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 10
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT
            ]
        ]);

        // Generar archivo
        $writer = new Xlsx($spreadsheet);
        
        // Crear respuesta de descarga
        return response()->streamDownload(function() use ($writer) {
            $writer->save('php://output');
        }, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    }
}
