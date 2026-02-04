<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Historial de Aire Acondicionado</title>
    <style>
        @page {
            margin: 160px 20px 60px 20px;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }
        .header-fixed {
            position: fixed;
            top: -140px;
            left: 0;
            right: 0;
            height: 100px;
            border-bottom: 3px solid #2563eb;
            padding: 10px 20px;
            background: white;
        }
        .header-fixed .logo {
            width: 60px;
            height: auto;
        }
        .header-fixed .hospital-name {
            font-size: 12px;
            color: #2563eb;
            font-weight: bold;
            margin: 0;
        }
        .header-fixed .subtitle {
            font-size: 9px;
            color: #64748b;
            margin: 2px 0 0 0;
        }
        .header-fixed h1 {
            margin: 0;
            color: #1e40af;
            font-size: 18px;
        }
        .header-fixed .record-count {
            margin: 3px 0 0 0;
            color: #64748b;
            font-size: 10px;
        }
        .info-section {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
        }
        .info-table {
            width: 100%;
        }
        .info-table td {
            padding: 2px 5px;
            border: none;
        }
        .info-label {
            font-weight: bold;
            color: #475569;
            width: 100px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #2563eb;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 9px;
        }
        td {
            padding: 6px 8px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 9px;
            vertical-align: top;
        }
        tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .badge {
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 8px;
            font-weight: bold;
            display: inline-block;
        }
        /* Colores */
        .color-mantenimiento { background: #dbeafe; color: #1d4ed8; }
        .color-reparacion { background: #fef3c7; color: #b45309; }
        .color-falla { background: #fee2e2; color: #b91c1c; }
        .color-instalacion { background: #f3e8ff; color: #6b21a8; }
        .color-otro { background: #f3f4f6; color: #374151; }
        
        .footer-fixed {
            position: fixed;
            bottom: -40px;
            left: 0;
            right: 0;
            height: 40px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            padding-top: 8px;
            font-size: 8px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="header-fixed">
        <table style="width: 100%; border: none; margin: 0;">
            <tr>
                <td style="width: 50%; vertical-align: middle; border: none; padding: 0;">
                    <div class="left-section">
                        <img src="{{ public_path('images/svg/virgen-compact-dark.svg') }}" alt="Logo" class="logo" style="vertical-align: middle;">
                        <div class="hospital-info" style="display: inline-block; vertical-align: middle; margin-left: 10px;">
                            <div class="hospital-name">Hospital Virgen del Valle</div>
                            <div class="subtitle">Sistema de Control Hospitalario</div>
                        </div>
                    </div>
                </td>
                <td style="width: 50%; text-align: right; vertical-align: middle; border: none; padding: 0;">
                    <div class="center-section">
                        <h1>HISTORIAL DE AIRE ACONDICIONADO</h1>
                        <p class="record-count">Registros encontrados: {{ $historial->count() }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="info-section">
        <table class="info-table">
            <tr>
                <td class="info-label">Equipo:</td>
                <td>{{ $aire->nombre_aa }}</td>
                <td class="info-label">Código BN:</td>
                <td>{{ $aire->numero_bn }}</td>
            </tr>
            <tr>
                <td class="info-label">Modelo:</td>
                <td>{{ $aire->modelo }}</td>
                <td class="info-label">Capacidad:</td>
                <td>{{ $aire->capacidad }}</td>
            </tr>
            <tr>
                <td class="info-label">Ubicación:</td>
                <td>{{ $aire->bienNacional->area->descripcion ?? 'N/A' }}</td>
                <td class="info-label">Refrigerante:</td>
                <td>{{ $aire->refrigerante_tc ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 15%">Fecha</th>
                <th style="width: 15%">Tipo</th>
                <th style="width: 20%">Trabajo Realizado</th>
                <th style="width: 25%">Descripción</th>
                <th style="width: 15%">Estado Final</th>
                <th style="width: 10%">Técnico</th>
            </tr>
        </thead>
        <tbody>
            @forelse($historial as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item->fecha_reporte)->format('d/m/Y') }}</td>
                <td>
                    <span class="badge color-{{ strtolower($item->tipo_mantenimiento ?? 'otro') }}">
                        {{ $item->tipo_mantenimiento ?? 'Otro' }}
                    </span>
                </td>
                <td>{{ $item->trabajo_realizado }}</td>
                <td>{{ $item->descripcion_intervencion }}</td>
                <td>{{ $item->estado_final ?? 'N/A' }}</td>
                <td>{{ $item->tecnico_responsable ?? 'Sistema' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px; color: #64748b;">
                    No hay registros de historial para los filtros seleccionados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer-fixed">
        <p>Generado el {{ date('d/m/Y H:i') }} | <span class="version">Sistema v1.0.0</span> | Hospital Virgen del Valle</p>
    </div>
</body>
</html>
