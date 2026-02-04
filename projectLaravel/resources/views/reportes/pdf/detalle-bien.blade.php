<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha Técnica de Bien Nacional</title>
    <style>
        @page {
            margin: 160px 30px 60px 30px;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #334155;
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
            font-size: 20px;
        }
        
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #1e40af;
            border-bottom: 1px solid #cbd5e1;
            padding-bottom: 5px;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        
        .detail-grid {
            width: 100%;
            border-collapse: collapse;
        }
        .detail-row td {
            padding: 8px;
            vertical-align: top;
        }
        .label {
            font-weight: bold;
            color: #64748b;
            width: 140px;
        }
        .value {
            color: #0f172a;
        }
        
        .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 10px;
            text-transform: uppercase;
        }
        .status-operativo { background: #d1fae5; color: #065f46; }
        .status-mantenimiento { background: #fef3c7; color: #92400e; }
        .status-fuera { background: #fee2e2; color: #991b1b; }
        .status-desinc { background: #f3f4f6; color: #374151; }

        .image-container {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .qr-section {
            position: absolute;
            top: 20px;
            right: 0;
            text-align: center;
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
    </style>
</head>
<body>
    <div class="header-fixed">
        <table style="width: 100%; border: none; margin: 0;">
            <tr>
                <td style="width: 40%; vertical-align: middle;">
                    <div class="left-section">
                        <img src="{{ public_path('images/svg/virgen-compact-dark.svg') }}" alt="Logo" class="logo" style="vertical-align: middle;">
                        <div class="hospital-info" style="display: inline-block; vertical-align: middle; margin-left: 10px;">
                            <div class="hospital-name">Hospital Virgen del Valle</div>
                            <div class="subtitle">Sistema de Control Hospitalario</div>
                        </div>
                    </div>
                </td>
                <td style="width: 40%; text-align: right; vertical-align: middle;">
                    <h1>FICHA TÉCNICA</h1>
                    <p style="margin: 5px 0 0 0; font-size: 12px; color: #64748b;">Código BN: <strong>{{ $bien->numero_bn }}</strong></p>
                </td>
                <td style="width: 20%; text-align: right; vertical-align: middle;">
                    <img src="{{ $qrCodeBase64 }}" width="70" height="70" alt="QR">
                </td>
            </tr>
        </table>
    </div>

    <!-- Información Principal -->
    <div class="section-title">Información General</div>
    <table class="detail-grid">
        <tr class="detail-row">
            <td class="label">Nombre del Bien:</td>
            <td class="value"><strong>{{ $bien->nombre }}</strong></td>
            <td class="label">Estado Actual:</td>
            <td class="value">
                <span class="status-badge 
                    {{ $bien->estado == 'Operativo' ? 'status-operativo' : '' }}
                    {{ $bien->estado == 'Mantenimiento' ? 'status-mantenimiento' : '' }}
                    {{ $bien->estado == 'Fuera de Servicio' || $bien->estado == 'Dañado' ? 'status-fuera' : '' }}
                    {{ $bien->estado == 'Desincorporado' ? 'status-desinc' : '' }}
                ">
                    {{ $bien->estado }}
                </span>
            </td>
        </tr>
        <tr class="detail-row">
            <td class="label">Marca:</td>
            <td class="value">{{ $bien->marca ?? 'N/A' }}</td>
            <td class="label">Modelo:</td>
            <td class="value">{{ $bien->modelo ?? 'N/A' }}</td>
        </tr>
        <tr class="detail-row">
            <td class="label">Serial:</td>
            <td class="value">{{ $bien->serial ?? 'N/A' }}</td>
            <td class="label">Categoría:</td>
            <td class="value">{{ $bien->categoria->nombre ?? 'N/A' }}</td>
        </tr>
    </table>

    <!-- Ubicación y Fecha -->
    <div class="section-title">Ubicación y Registro</div>
    <table class="detail-grid">
        <tr class="detail-row">
            <td class="label">Área / Departamento:</td>
            <td class="value">{{ $bien->area->nombre ?? 'N/A' }}</td>
            <td class="label">Fecha de Registro:</td>
            <td class="value">{{ $bien->created_at->format('d/m/Y h:i A') }}</td>
        </tr>
    </table>

    <!-- Especificaciones Técnicas (si aplica) -->
    <!-- Aquí podrías iterar sobre campos adicionales si existieran en una tabla relacionada -->
    
    <div style="margin-top: 50px; padding: 15px; background: #f1f5f9; border-radius: 5px; font-size: 10px; color: #64748b;">
        <p style="margin: 0;"><strong>Nota:</strong> Esta ficha técnica es un documento generado por el sistema. Cualquier modificación física o lógica del bien debe ser reportada inmediatamente al departamento correspondiente.</p>
    </div>

    <div class="footer-fixed">
        <p>Generado el {{ date('d/m/Y H:i') }} | <span class="version">Sistema v1.0.0</span> | Hospital Virgen del Valle</p>
    </div>
</body>
</html>
