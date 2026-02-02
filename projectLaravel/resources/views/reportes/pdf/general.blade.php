<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte General de Inventario</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
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
        }
        tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 8px;
            font-weight: bold;
        }
        .badge-operativo {
            background-color: #d1fae5;
            color: #065f46;
        }
        .badge-mantenimiento {
            background-color: #fef3c7;
            color: #92400e;
        }
        .badge-fuera {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .badge-desinc {
            background-color: #e5e7eb;
            color: #374151;
        }
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
        .footer-fixed .version {
            font-weight: bold;
            color: #2563eb;
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
                        <h1>REPORTE GENERAL DE INVENTARIO</h1>
                        <p class="record-count">Total de registros: {{ $bienes->count() }}</p>
                        <p class="record-count" style="margin-top: 5px;">Generado por: <span style="font-weight: bold; color: #1e40af;">{{ $user->name ?? 'Sistema' }}</span></p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th>Código BN</th>
                <th>Nombre</th>
                <th>Marca/Modelo</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Ubicación</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bienes as $bien)
            <tr>
                <td>{{ $bien->numero_bn }}</td>
                <td>{{ $bien->nombre }}</td>
                <td>{{ $bien->marca }} {{ $bien->modelo }}</td>
                <td>{{ $bien->categoria->nombre ?? 'N/A' }}</td>
                <td>
                    <span class="badge 
                        {{ $bien->estado == 'Operativo' ? 'badge-operativo' : '' }}
                        {{ $bien->estado == 'Mantenimiento' ? 'badge-mantenimiento' : '' }}
                        {{ $bien->estado == 'Fuera de Servicio' || $bien->estado == 'Dañado' ? 'badge-fuera' : '' }}
                        {{ $bien->estado == 'Desincorporado' ? 'badge-desinc' : '' }}
                    ">
                        {{ $bien->estado }}
                    </span>
                </td>
                <td>{{ $bien->area->nombre ?? 'Sin Asignar' }}</td>
                <td>{{ $bien->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-fixed">
        <p>Generado el {{ date('d/m/Y H:i') }} | <span class="version">Sistema v1.0.0</span> | Hospital Virgen del Valle</p>
    </div>
</body>
</html>
