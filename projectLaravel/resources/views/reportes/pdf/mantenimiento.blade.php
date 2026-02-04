<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Mantenimientos</title>
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
            border-bottom: 3px solid #d97706; /* Amber-600 */
            padding: 10px 20px;
            background: white;
        }
        .header-fixed .logo {
            width: 60px;
            height: auto;
        }
        .header-fixed .hospital-name {
            font-size: 12px;
            color: #d97706; /* Amber-600 */
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
            color: #92400e; /* Amber-800 */
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
            background-color: #d97706; /* Amber-600 */
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
            background-color: #fef3c7; /* Amber-50 */
        }
        .badge {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 8px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-preventivo {
            background-color: #dbeafe; /* Blue-100 */
            color: #1e40af; /* Blue-800 */
        }
        .badge-correctivo {
            background-color: #fee2e2; /* Red-100 */
            color: #991b1b; /* Red-800 */
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
            color: #d97706; /* Amber-600 */
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
                        <h1>REPORTE DE MANTENIMIENTOS</h1>
                        <p class="record-count">Total de registros: {{ $mantenimientos->count() }}</p>
                        <p class="record-count" style="margin-top: 5px;">Generado por: <span style="font-weight: bold; color: #92400e;">{{ $user->name ?? 'Sistema' }}</span></p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 20%;">Equipo</th>
                <th style="width: 35%;">Descripción del Trabajo</th>
                <th style="width: 20%;">Ubicación</th>
                <th style="width: 10%;">Tipo</th>
                <th style="width: 15%;">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mantenimientos as $mant)
            <tr>
                <td>{{ $mant->titulo }}</td>
                <td>{{ $mant->descripcion }}</td>
                <td>{{ $mant->ubicacion }}</td>
                <td>
                    @php
                        $isPreventive = stripos($mant->tipo, 'Preventivo') !== false || stripos($mant->titulo, 'Preventivo') !== false;
                    @endphp
                    <span class="badge {{ $isPreventive ? 'badge-preventivo' : 'badge-correctivo' }}">
                        {{ $mant->tipo }}
                    </span>
                </td>
                <td>{{ $mant->fecha->format('d/m/Y h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-fixed">
        <p>Generado el {{ date('d/m/Y H:i') }} | <span class="version">Sistema v1.0.0</span> | Hospital Virgen del Valle</p>
    </div>
</body>
</html>
