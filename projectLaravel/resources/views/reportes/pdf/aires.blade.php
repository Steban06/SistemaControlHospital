<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Aires Acondicionados</title>
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
            border-bottom: 3px solid #0d9488;
            padding: 10px 20px;
            background: white;
        }
        .header-fixed .logo {
            width: 60px;
            height: auto;
        }
        .header-fixed .hospital-name {
            font-size: 12px;
            color: #0d9488;
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
            color: #0f766e;
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
            background-color: #0d9488;
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
            background-color: #f0fdfa;
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
            color: #0d9488;
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
                        <h1>REPORTE DE AIRES ACONDICIONADOS</h1>
                        <p class="record-count">Total de equipos: {{ $aires->count() }}</p>
                        <p class="record-count" style="margin-top: 5px;">Generado por: <span style="font-weight: bold; color: #0d9488;">{{ $user->name ?? 'Sistema' }}</span></p>
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
                <th>Modelo</th>
                <th>Capacidad</th>
                <th>Voltaje</th>
                <th>Estado</th>
                <th>Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aires as $aire)
            <tr>
                <td>{{ $aire->numero_bn }}</td>
                <td>{{ $aire->nombre_aa ?? 'N/A' }}</td>
                <td>{{ $aire->modelo ?? 'N/A' }}</td>
                <td>{{ $aire->capacidad ?? 'N/A' }}</td>
                <td>{{ $aire->voltaje_rango ?? 'N/A' }}</td>
                <td>
                    <span class="badge 
                        {{ $aire->estado == 'Operativo' ? 'badge-operativo' : '' }}
                        {{ $aire->estado == 'Mantenimiento' ? 'badge-mantenimiento' : '' }}
                        {{ $aire->estado == 'Fuera de Servicio' || $aire->estado == 'Dañado' ? 'badge-fuera' : '' }}
                    ">
                        {{ $aire->estado ?? 'Desconocido' }}
                    </span>
                </td>
                <td>{{ $aire->bienNacional->area->nombre ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-fixed">
        <p>Generado el {{ date('d/m/Y H:i') }} | <span class="version">Sistema v1.0.0</span> | Hospital Virgen del Valle</p>
    </div>
</body>
</html>
