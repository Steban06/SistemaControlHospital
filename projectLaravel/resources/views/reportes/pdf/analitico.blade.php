<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte Analítico</title>
    <style>
        @page {
            margin: 160px 30px 60px 30px;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }
        .header-fixed {
            position: fixed;
            top: -140px;
            left: 0;
            right: 0;
            height: 100px;
            border-bottom: 3px solid #9333ea;
            padding: 10px 20px;
            background: white;
        }
        .header-fixed .logo {
            width: 60px;
            height: auto;
        }
        .header-fixed .hospital-name {
            font-size: 12px;
            color: #9333ea;
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
            color: #7e22ce;
            font-size: 22px;
        }
        .header-fixed .subtitle-center {
            margin: 3px 0 0 0;
            color: #64748b;
            font-size: 12px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #7e22ce;
            margin-bottom: 15px;
            border-bottom: 2px solid #e9d5ff;
            padding-bottom: 5px;
        }
        .stats-grid {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        .stat-row {
            display: table-row;
        }
        .stat-cell {
            display: table-cell;
            padding: 10px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
        }
        .stat-label {
            font-weight: bold;
            color: #475569;
            margin-bottom: 5px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #1e293b;
        }
        .stat-percentage {
            font-size: 12px;
            color: #64748b;
        }
        .bar-chart {
            margin-top: 10px;
        }
        .bar-item {
            margin-bottom: 15px;
        }
        .bar-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 11px;
        }
        .bar-container {
            width: 100%;
            height: 20px;
            background-color: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }
        .bar-fill {
            height: 100%;
            border-radius: 10px;
        }
        .bar-operativo { background-color: #10b981; }
        .bar-mantenimiento { background-color: #f59e0b; }
        .bar-fuera { background-color: #ef4444; }
        .bar-desinc { background-color: #6b7280; }
        .bar-area { background-color: #3b82f6; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th {
            background-color: #9333ea;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 8px 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:nth-child(even) {
            background-color: #faf5ff;
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
            font-size: 9px;
            color: #64748b;
        }
        .footer-fixed .version {
            font-weight: bold;
            color: #9333ea;
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
                        <h1>REPORTE ANALÍTICO</h1>
                        <p class="subtitle-center">Estadísticas y Tendencias</p>
                        <p class="subtitle-center" style="margin-top: 5px;">Generado por: <span style="font-weight: bold; color: #7e22ce;">{{ $user->name ?? 'Sistema' }}</span></p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Resumen por Estado -->
    <div class="section">
        <div class="section-title">Distribución por Estado</div>
        
        @php
            $total = array_sum($estadoPorcentajes);
        @endphp

        <div class="stats-grid">
            <div class="stat-row">
                @foreach($estadoPorcentajes as $estado => $cantidad)
                    @php
                        $porcentaje = $total > 0 ? round(($cantidad / $total) * 100, 1) : 0;
                    @endphp
                    <div class="stat-cell">
                        <div class="stat-label">{{ $estado }}</div>
                        <div class="stat-value">{{ $cantidad }}</div>
                        <div class="stat-percentage">{{ $porcentaje }}%</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bar-chart">
            @foreach($estadoPorcentajes as $estado => $cantidad)
                @php
                    $porcentaje = $total > 0 ? round(($cantidad / $total) * 100, 1) : 0;
                    $barClass = match($estado) {
                        'Operativo' => 'bar-operativo',
                        'Mantenimiento' => 'bar-mantenimiento',
                        'Fuera de Servicio' => 'bar-fuera',
                        'Desincorporado' => 'bar-desinc',
                        default => 'bar-area'
                    };
                @endphp
                <div class="bar-item">
                    <div class="bar-label">
                        <span><strong>{{ $estado }}</strong></span>
                        <span>{{ $cantidad }} ({{ $porcentaje }}%)</span>
                    </div>
                    <div class="bar-container">
                        <div class="bar-fill {{ $barClass }}" style="width: {{ $porcentaje }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Top 5 Áreas -->
    <div class="section">
        <div class="section-title">Top 5 Áreas con Más Bienes</div>
        
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Área</th>
                    <th>Cantidad de Bienes</th>
                    <th>Porcentaje del Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bienesPorArea as $index => $item)
                    @php
                        $porcentaje = $total > 0 ? round(($item->total / $total) * 100, 1) : 0;
                    @endphp
                    <tr>
                        <td><strong>{{ $index + 1 }}</strong></td>
                        <td>{{ $item->area->nombre ?? 'Sin Área' }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $porcentaje }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Resumen General</div>
        <p><strong>Total de Bienes Registrados:</strong> {{ $total }}</p>
        <p><strong>Bienes Operativos:</strong> {{ $estadoPorcentajes['Operativo'] ?? 0 }} ({{ $total > 0 ? round(($estadoPorcentajes['Operativo'] / $total) * 100, 1) : 0 }}%)</p>
        <p><strong>Bienes en Mantenimiento:</strong> {{ $estadoPorcentajes['Mantenimiento'] ?? 0 }}</p>
        <p><strong>Bienes Fuera de Servicio:</strong> {{ $estadoPorcentajes['Fuera de Servicio'] ?? 0 }}</p>
    </div>

    <div class="footer-fixed">
        <p>Generado el {{ date('d/m/Y H:i') }} | <span class="version">Sistema v1.0.0</span> | Hospital Virgen del Valle</p>
    </div>
</body>
</html>
