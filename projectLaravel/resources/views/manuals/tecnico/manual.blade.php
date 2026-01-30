<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual Técnico - Sistema de Control Hospital</title>
    <style>
        @page {
            margin: 2cm;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #333;
        }
        h1 {
            color: #6366f1;
            font-size: 24pt;
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 3px solid #6366f1;
        }
        h2 {
            color: #4f46e5;
            font-size: 18pt;
            margin-top: 20px;
            margin-bottom: 10px;
            page-break-after: avoid;
        }
        h3 {
            color: #818cf8;
            font-size: 14pt;
            margin-top: 15px;
            margin-bottom: 8px;
        }
        h4 {
            color: #a5b4fc;
            font-size: 12pt;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        p {
            margin: 8px 0;
            text-align: justify;
        }
        .portada {
            text-align: center;
            padding: 100px 0;
            page-break-after: always;
        }
        .portada h1 {
            font-size: 32pt;
            margin-bottom: 20px;
            border: none;
        }
        .portada .subtitle {
            font-size: 18pt;
            color: #666;
            margin-bottom: 40px;
        }
        .portada .info {
            font-size: 12pt;
            color: #888;
            margin-top: 60px;
        }
        .section {
            page-break-before: always;
        }
        .code-block {
            background-color: #1e293b;
            color: #e2e8f0;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 9pt;
            margin: 15px 0;
            overflow-x: auto;
            white-space: pre-wrap;
        }
        .code {
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 10pt;
        }
        .note {
            background-color: #eff6ff;
            border-left: 4px solid #6366f1;
            padding: 10px 15px;
            margin: 15px 0;
        }
        .warning {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 10px 15px;
            margin: 15px 0;
        }
        .important {
            background-color: #fef2f2;
            border-left: 4px solid #ef4444;
            padding: 10px 15px;
            margin: 15px 0;
        }
        ul, ol {
            margin: 10px 0 10px 25px;
        }
        li {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 10pt;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eff6ff;
            color: #4f46e5;
            font-weight: bold;
        }
        .diagram {
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>

<!-- PORTADA -->
<div class="portada" style="position: relative;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.08; z-index: 0;">
        <img src="data:image/svg+xml;base64,{{ base64_encode(file_get_contents(public_path('images/svg/virgen-compact.svg'))) }}" style="width: 400px; height: auto;">
    </div>
    <div style="position: relative; z-index: 1;">
        <h1>Sistema de Control Hospital</h1>
        <div class="subtitle">Manual Técnico</div>
        <div class="subtitle">Hospital Virgen Del Valle</div>
        <div class="info">
            <p>Versión 1.0</p>
            <p>Enero 2026</p>
            <p>Documentación para Desarrolladores y Administradores</p>
        </div>
    </div>
</div>

<!-- ÍNDICE -->
<div class="section">
    <h1>Índice</h1>
    <ol>
        <li>Arquitectura del Sistema</li>
        <li>Base de Datos</li>
        <li>Rutas y Endpoints</li>
        <li>Modelos y Relaciones</li>
        <li>Controladores</li>
        <li>Vistas y Frontend</li>
        <li>Generación de PDFs y QR</li>
        <li>Instalación y Despliegue</li>
    </ol>
</div>

<!-- 1. ARQUITECTURA -->
<div class="section">
    <h1>1. Arquitectura del Sistema</h1>
    
    <h2>1.1 Stack Tecnológico</h2>
    <table>
        <tr>
            <th>Componente</th>
            <th>Tecnología</th>
            <th>Versión</th>
        </tr>
        <tr>
            <td>Framework Backend</td>
            <td>Laravel</td>
            <td>11.x</td>
        </tr>
        <tr>
            <td>Lenguaje</td>
            <td>PHP</td>
            <td>8.2+</td>
        </tr>
        <tr>
            <td>Base de Datos</td>
            <td>MySQL</td>
            <td>8.0+</td>
        </tr>
        <tr>
            <td>Framework CSS</td>
            <td>Tailwind CSS</td>
            <td>4.0</td>
        </tr>
        <tr>
            <td>Motor de Plantillas</td>
            <td>Blade</td>
            <td>Laravel 11</td>
        </tr>
        <tr>
            <td>Generación PDF</td>
            <td>DomPDF</td>
            <td>2.x</td>
        </tr>
        <tr>
            <td>Generación QR</td>
            <td>SimpleSoftwareIO/simple-qrcode</td>
            <td>4.x</td>
        </tr>
    </table>

    <h2>1.2 Patrón de Arquitectura</h2>
    <p>El sistema implementa el patrón MVC (Model-View-Controller) de Laravel:</p>
    <ul>
        <li><strong>Modelos:</strong> Representan las entidades de la base de datos (BN, AireAcondicionado, Mantenimiento, etc.)</li>
        <li><strong>Vistas:</strong> Plantillas Blade que renderizan la interfaz de usuario</li>
        <li><strong>Controladores:</strong> Lógica de negocio que procesa las peticiones</li>
    </ul>

    <h2>1.3 Estructura de Directorios</h2>
    <div class="code-block">projectLaravel/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── BNController.php
│   │       ├── AirAcondController.php
│   │       ├── MaintenanceController.php
│   │       ├── ReportesController.php
│   │       ├── DashboardController.php
│   │       └── ManualController.php
│   └── Models/
│       ├── BN.php
│       ├── AireAcondicionado.php
│       ├── Mantenimiento.php
│       ├── ReportesBN.php
│       ├── Area.php
│       └── Categoria.php
├── database/
│   └── migrations/
├── public/
│   ├── docs/
│   └── images/
├── resources/
│   └── views/
│       ├── layouts/
│       ├── modals/
│       ├── manuals/
│       └── *.blade.php
└── routes/
    └── web.php</div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/tech_02_estructura.png') }}" style="width: 50%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>1.4 Flujo de Datos</h2>
    <p>El flujo típico de una petición es:</p>
    <ol>
        <li>Usuario realiza una acción en la interfaz</li>
        <li>La ruta en <span class="code">web.php</span> captura la petición</li>
        <li>El controlador correspondiente procesa la lógica</li>
        <li>El modelo interactúa con la base de datos si es necesario</li>
        <li>El controlador retorna una vista o respuesta JSON</li>
        <li>La vista Blade renderiza el HTML final</li>
    </ol>
</div>

<!-- 2. BASE DE DATOS -->
<div class="section">
    <h1>2. Base de Datos</h1>
    
    <h2>2.1 Esquema de Tablas</h2>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/tech_01_database.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <h3>2.1.1 Tabla: bns (Bienes Nacionales)</h3>
    <table>
        <tr>
            <th>Campo</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td>id</td>
            <td>BIGINT</td>
            <td>Clave primaria</td>
        </tr>
        <tr>
            <td>numero_bien</td>
            <td>VARCHAR(255)</td>
            <td>Número único del bien nacional</td>
        </tr>
        <tr>
            <td>descripcion</td>
            <td>TEXT</td>
            <td>Descripción del bien</td>
        </tr>
        <tr>
            <td>area_id</td>
            <td>BIGINT</td>
            <td>FK a tabla areas</td>
        </tr>
        <tr>
            <td>categoria_id</td>
            <td>BIGINT</td>
            <td>FK a tabla categorias</td>
        </tr>
        <tr>
            <td>estado</td>
            <td>VARCHAR(50)</td>
            <td>Estado actual del bien</td>
        </tr>
        <tr>
            <td>observaciones</td>
            <td>TEXT</td>
            <td>Observaciones adicionales</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de creación</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de actualización</td>
        </tr>
    </table>

    <h3>2.1.2 Tabla: aires_acondicionados</h3>
    <table>
        <tr>
            <th>Campo</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td>id</td>
            <td>BIGINT</td>
            <td>Clave primaria</td>
        </tr>
        <tr>
            <td>nombre</td>
            <td>VARCHAR(255)</td>
            <td>Nombre del equipo</td>
        </tr>
        <tr>
            <td>ubicacion</td>
            <td>VARCHAR(255)</td>
            <td>Ubicación/Área</td>
        </tr>
        <tr>
            <td>capacidad</td>
            <td>DECIMAL(5,2)</td>
            <td>Capacidad en toneladas</td>
        </tr>
        <tr>
            <td>estado</td>
            <td>VARCHAR(50)</td>
            <td>Estado operativo</td>
        </tr>
        <tr>
            <td>marca</td>
            <td>VARCHAR(100)</td>
            <td>Marca del equipo</td>
        </tr>
        <tr>
            <td>modelo</td>
            <td>VARCHAR(100)</td>
            <td>Modelo del equipo</td>
        </tr>
        <tr>
            <td>numero_serie</td>
            <td>VARCHAR(100)</td>
            <td>Número de serie</td>
        </tr>
        <tr>
            <td>tipo_refrigerante</td>
            <td>VARCHAR(50)</td>
            <td>Tipo de refrigerante</td>
        </tr>
        <tr>
            <td>voltaje</td>
            <td>VARCHAR(20)</td>
            <td>Voltaje de operación</td>
        </tr>
        <tr>
            <td>amperaje</td>
            <td>VARCHAR(20)</td>
            <td>Amperaje</td>
        </tr>
        <tr>
            <td>fecha_instalacion</td>
            <td>DATE</td>
            <td>Fecha de instalación</td>
        </tr>
        <tr>
            <td>horas_uso</td>
            <td>INTEGER</td>
            <td>Horas de uso acumuladas</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de creación</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de actualización</td>
        </tr>
    </table>

    <h3>2.1.3 Tabla: mantenimientos</h3>
    <table>
        <tr>
            <th>Campo</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td>id</td>
            <td>BIGINT</td>
            <td>Clave primaria</td>
        </tr>
        <tr>
            <td>aire_acondicionado_id</td>
            <td>BIGINT</td>
            <td>FK a aires_acondicionados</td>
        </tr>
        <tr>
            <td>tipo</td>
            <td>VARCHAR(50)</td>
            <td>Preventivo/Correctivo</td>
        </tr>
        <tr>
            <td>fecha</td>
            <td>DATE</td>
            <td>Fecha del mantenimiento</td>
        </tr>
        <tr>
            <td>tecnico</td>
            <td>VARCHAR(255)</td>
            <td>Técnico responsable</td>
        </tr>
        <tr>
            <td>descripcion</td>
            <td>TEXT</td>
            <td>Descripción de trabajos</td>
        </tr>
        <tr>
            <td>materiales</td>
            <td>JSON</td>
            <td>Materiales utilizados</td>
        </tr>
        <tr>
            <td>observaciones</td>
            <td>TEXT</td>
            <td>Observaciones</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de creación</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de actualización</td>
        </tr>
    </table>

    <h3>2.1.4 Tabla: reportes_bns</h3>
    <table>
        <tr>
            <th>Campo</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td>id</td>
            <td>BIGINT</td>
            <td>Clave primaria</td>
        </tr>
        <tr>
            <td>bn_id</td>
            <td>BIGINT</td>
            <td>FK a bns</td>
        </tr>
        <tr>
            <td>tipo_actividad</td>
            <td>VARCHAR(100)</td>
            <td>Tipo de reporte</td>
        </tr>
        <tr>
            <td>fecha</td>
            <td>DATE</td>
            <td>Fecha del reporte</td>
        </tr>
        <tr>
            <td>descripcion</td>
            <td>TEXT</td>
            <td>Descripción del reporte</td>
        </tr>
        <tr>
            <td>responsable</td>
            <td>VARCHAR(255)</td>
            <td>Responsable del reporte</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de creación</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>Fecha de actualización</td>
        </tr>
    </table>

    <h2>2.2 Relaciones</h2>
    <ul>
        <li><strong>BN → Area:</strong> Muchos a Uno (belongsTo)</li>
        <li><strong>BN → Categoria:</strong> Muchos a Uno (belongsTo)</li>
        <li><strong>BN → ReportesBN:</strong> Uno a Muchos (hasMany)</li>
        <li><strong>AireAcondicionado → Mantenimiento:</strong> Uno a Muchos (hasMany)</li>
    </ul>

    <h2>2.3 Migraciones</h2>
    <p>Las migraciones se encuentran en <span class="code">database/migrations/</span>. Para ejecutarlas:</p>
    <div class="code-block">php artisan migrate</div>

    <p>Para revertir migraciones:</p>
    <div class="code-block">php artisan migrate:rollback</div>
</div>

<!-- 3. RUTAS Y ENDPOINTS -->
<div class="section">
    <h1>3. Rutas y Endpoints</h1>
    
    <h2>3.1 Rutas Principales</h2>
    <p>Definidas en <span class="code">routes/web.php</span>:</p>

    <h3>Dashboard</h3>
    <div class="code-block">Route::get('/inicio', DashboardController::class)->name('inicio');</div>

    <h3>Bienes Nacionales</h3>
    <div class="code-block">Route::prefix('bienes-nacionales')->group(function () {
    Route::get('/', [BNController::class, 'index'])->name('bienes-nacionales.index');
    Route::post('/', [BNController::class, 'store'])->name('bienes-nacionales.store');
    Route::put('/{id}', [BNController::class, 'update'])->name('bienes-nacionales.update');
    Route::delete('/{id}', [BNController::class, 'destroy'])->name('bienes-nacionales.destroy');
    Route::get('/history/{id}', [BNController::class, 'history'])->name('bienes-nacionales.history');
    Route::get('/history/{id}/pdf', [BNController::class, 'downloadHistoryPDF'])->name('bienes-nacionales.history.pdf');
    Route::get('/{id}/pdf', [BNController::class, 'downloadPDF'])->name('bienes-nacionales.pdf');
    Route::get('/{id}/qr', [BNController::class, 'generateQR'])->name('bienes-nacionales.qr');
});</div>

    <h3>Aires Acondicionados</h3>
    <div class="code-block">Route::get('/aires-acondicionados', [AirAcondController::class, 'index'])->name('aires-acondicionados.index');
Route::post('/aires-acondicionados', [AirAcondController::class, 'store'])->name('aires-acondicionados.store');
Route::get('/aires-acondicionados/{id}/edit', [AirAcondController::class, 'edit'])->name('aires-acondicionados.edit');
Route::put('/aires-acondicionados/{id}', [AirAcondController::class, 'update'])->name('aires-acondicionados.update');
Route::get('/aires-acondicionados/{id}', [AirAcondController::class, 'show'])->name('aires-acondicionados.show');</div>

    <h3>Mantenimientos</h3>
    <div class="code-block">Route::get('/mantenimiento', [MaintenanceController::class, 'index'])->name('mantenimiento.index');
Route::post('/mantenimiento', [MaintenanceController::class, 'store'])->name('mantenimiento.store');
Route::get('/mantenimiento/{id}', [MaintenanceController::class, 'show'])->name('mantenimiento.show');</div>

    <h3>Reportes</h3>
    <div class="code-block">Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes');
Route::get('/reportes/general', [ReportesController::class, 'reporteGeneral'])->name('reportes.general');
Route::get('/reportes/aires', [ReportesController::class, 'reporteAires'])->name('reportes.aires');
Route::get('/reportes/analitico', [ReportesController::class, 'reporteAnalitico'])->name('reportes.analitico');
Route::get('/reportes/{tipo}/pdf', [ReportesController::class, 'generarPDF'])->name('reportes.pdf');</div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/tech_03_routes.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>3.2 Middleware</h2>
    <p>Las rutas están protegidas por middleware de autenticación (si está configurado).</p>
</div>

<!-- 4. MODELOS -->
<div class="section">
    <h1>4. Modelos y Relaciones</h1>
    
    <h2>4.1 Modelo BN</h2>
    <div class="code-block">namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BN extends Model
{
    protected $table = 'bns';
    
    protected $fillable = [
        'numero_bien',
        'descripcion',
        'area_id',
        'categoria_id',
        'estado',
        'observaciones'
    ];

    // Relaciones
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function reportes()
    {
        return $this->hasMany(ReportesBN::class);
    }
}</div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/tech_05_model.png') }}" style="width: 80%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>4.2 Modelo AireAcondicionado</h2>
    <div class="code-block">namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
    protected $table = 'aires_acondicionados';
    
    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'estado',
        'marca',
        'modelo',
        'numero_serie',
        'tipo_refrigerante',
        'voltaje',
        'amperaje',
        'fecha_instalacion',
        'horas_uso'
    ];

    protected $casts = [
        'fecha_instalacion' => 'date',
        'capacidad' => 'decimal:2'
    ];

    // Relaciones
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }
}</div>

    <h2>4.3 Modelo Mantenimiento</h2>
    <div class="code-block">namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos';
    
    protected $fillable = [
        'aire_acondicionado_id',
        'tipo',
        'fecha',
        'tecnico',
        'descripcion',
        'materiales',
        'observaciones'
    ];

    protected $casts = [
        'fecha' => 'date',
        'materiales' => 'array'
    ];

    // Relaciones
    public function aireAcondicionado()
    {
        return $this->belongsTo(AireAcondicionado::class);
    }
}</div>
</div>

<!-- 5. CONTROLADORES -->
<div class="section">
    <h1>5. Controladores</h1>
    
    <h2>5.1 BNController</h2>
    <p>Gestiona todas las operaciones CRUD de bienes nacionales:</p>
    <ul>
        <li><span class="code">index()</span> - Lista todos los bienes</li>
        <li><span class="code">store(Request $request)</span> - Crea un nuevo bien</li>
        <li><span class="code">update(Request $request, $id)</span> - Actualiza un bien</li>
        <li><span class="code">destroy($id)</span> - Elimina un bien</li>
        <li><span class="code">history($id)</span> - Obtiene el historial de reportes</li>
        <li><span class="code">downloadPDF($id)</span> - Genera PDF del bien</li>
        <li><span class="code">downloadHistoryPDF($id)</span> - Genera PDF del historial</li>
        <li><span class="code">generateQR($id)</span> - Genera código QR</li>
    </ul>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/tech_04_controller.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>5.2 AirAcondController</h2>
    <p>Gestiona equipos de aire acondicionado:</p>
    <ul>
        <li><span class="code">index()</span> - Lista todos los equipos AC</li>
        <li><span class="code">store(Request $request)</span> - Registra nuevo equipo</li>
        <li><span class="code">show($id)</span> - Muestra detalles del equipo</li>
        <li><span class="code">edit($id)</span> - Prepara datos para edición</li>
        <li><span class="code">update(Request $request, $id)</span> - Actualiza equipo</li>
    </ul>

    <h2>5.3 MaintenanceController</h2>
    <p>Gestiona mantenimientos de equipos AC:</p>
    <ul>
        <li><span class="code">index()</span> - Lista mantenimientos</li>
        <li><span class="code">store(Request $request)</span> - Registra mantenimiento</li>
        <li><span class="code">show($id)</span> - Muestra detalles del mantenimiento</li>
    </ul>

    <h2>5.4 ReportesController</h2>
    <p>Genera reportes del sistema:</p>
    <ul>
        <li><span class="code">index()</span> - Vista principal de reportes</li>
        <li><span class="code">reporteGeneral()</span> - Reporte general</li>
        <li><span class="code">reporteAires()</span> - Reporte de AC</li>
        <li><span class="code">reporteAnalitico()</span> - Reporte analítico</li>
        <li><span class="code">generarPDF($tipo)</span> - Genera PDF del reporte</li>
    </ul>

    <h2>5.5 DashboardController</h2>
    <p>Muestra estadísticas del sistema:</p>
    <ul>
        <li><span class="code">__invoke()</span> - Retorna vista del dashboard con estadísticas</li>
    </ul>
</div>

<!-- 6. VISTAS Y FRONTEND -->
<div class="section">
    <h1>6. Vistas y Frontend</h1>
    
    <h2>6.1 Estructura de Vistas</h2>
    <div class="code-block">resources/views/
├── layouts/
│   ├── app.blade.php (Layout principal)
│   └── partials/
│       ├── header.blade.php
│       ├── sidebar.blade.php
│       └── footer.blade.php
├── modals/
│   ├── add_bien.blade.php
│   ├── view_bien.blade.php
│   ├── edit_bien.blade.php
│   ├── modal-history-bien.blade.php
│   ├── add_ac.blade.php
│   ├── view_ac.blade.php
│   ├── edit_ac.blade.php
│   ├── history_ac.blade.php
│   ├── register_maintenance.blade.php
│   └── add_missing_material.blade.php
├── bienes-nacionales.blade.php
├── aires-acondicionados.blade.php
├── reportes.blade.php
├── configuracion.blade.php
└── welcome.blade.php</div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/tech_06_blade.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>6.2 Tailwind CSS v4</h2>
    <p>El sistema utiliza Tailwind CSS v4 para el diseño. Características principales:</p>
    <ul>
        <li>Diseño responsive</li>
        <li>Modo oscuro nativo</li>
        <li>Componentes reutilizables</li>
        <li>Utilidades personalizadas</li>
    </ul>

    <h3>Ejemplo de Uso:</h3>
    <div class="code-block">&lt;button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 
       dark:bg-blue-700 dark:hover:bg-blue-800"&gt;
    Guardar
&lt;/button&gt;</div>

    <h2>6.3 Sistema de Modales</h2>
    <p>Los modales utilizan JavaScript vanilla para su funcionamiento:</p>
    <ul>
        <li>Apertura/cierre con atributos <span class="code">data-modal-open</span> y <span class="code">data-modal-close</span></li>
        <li>Gestión de estado con clases CSS</li>
        <li>Soporte para dark mode</li>
    </ul>

    <h2>6.4 Dark Mode</h2>
    <p>Implementación del modo oscuro:</p>
    <div class="code-block">// Toggle dark mode
document.documentElement.classList.toggle('dark');

// Guardar preferencia
localStorage.setItem('theme', isDark ? 'dark' : 'light');</div>
</div>

<!-- 7. PDFs Y QR -->
<div class="section">
    <h1>7. Generación de PDFs y QR</h1>
    
    <h2>7.1 DomPDF</h2>
    <p>Configuración para generar PDFs:</p>
    <div class="code-block">use Barryvdh\DomPDF\Facade\Pdf;

$pdf = Pdf::loadView('pdf.bien', ['bien' => $bien]);
$pdf->setPaper('a4', 'portrait');
return $pdf->download('bien_'.$bien->numero_bien.'.pdf');</div>

    <h2>7.2 Generación de QR</h2>
    <p>Uso de SimpleSoftwareIO/simple-qrcode:</p>
    <div class="code-block">use SimpleSoftwareIO\QrCode\Facades\QrCode;

$qr = QrCode::size(200)
    ->format('png')
    ->generate(route('bienes-nacionales.show', $id));

return response($qr)->header('Content-Type', 'image/png');</div>

    <h2>7.3 Plantillas PDF</h2>
    <p>Las plantillas PDF incluyen:</p>
    <ul>
        <li>Logo del hospital</li>
        <li>Información del bien/equipo</li>
        <li>Código QR embebido</li>
        <li>Estilos CSS inline</li>
    </ul>
</div>

<!-- 8. INSTALACIÓN -->
<div class="section">
    <h1>8. Instalación y Despliegue</h1>
    
    <h2>8.1 Requisitos del Sistema</h2>
    <ul>
        <li>PHP 8.2 o superior</li>
        <li>Composer 2.x</li>
        <li>MySQL 8.0 o superior</li>
        <li>Node.js 18.x o superior</li>
        <li>NPM 9.x o superior</li>
    </ul>

    <h2>8.2 Instalación Local</h2>
    <div class="code-block"># Clonar repositorio
git clone [repository-url]
cd projectLaravel

# Instalar dependencias PHP
composer install

# Instalar dependencias Node
npm install

# Copiar archivo de entorno
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Configurar base de datos en .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospital_control
DB_USERNAME=root
DB_PASSWORD=

# Ejecutar migraciones
php artisan migrate

# Compilar assets
npm run build

# Iniciar servidor de desarrollo
php artisan serve</div>

    <h2>8.3 Configuración de Base de Datos</h2>
    <p>Crear la base de datos:</p>
    <div class="code-block">CREATE DATABASE hospital_control CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;</div>

    <h2>8.4 Seeders (Opcional)</h2>
    <p>Para poblar la base de datos con datos de prueba:</p>
    <div class="code-block">php artisan db:seed</div>

    <h2>8.5 Despliegue en Producción</h2>
    
    <h3>8.5.1 Optimizaciones</h3>
    <div class="code-block"># Optimizar autoload
composer install --optimize-autoloader --no-dev

# Cachear configuración
php artisan config:cache

# Cachear rutas
php artisan route:cache

# Cachear vistas
php artisan view:cache

# Compilar assets para producción
npm run build</div>

    <h3>8.5.2 Configuración del Servidor</h3>
    <p>Configuración recomendada para Apache:</p>
    <div class="code-block">&lt;VirtualHost *:80&gt;
    ServerName hospital-control.local
    DocumentRoot /path/to/projectLaravel/public

    &lt;Directory /path/to/projectLaravel/public&gt;
        AllowOverride All
        Require all granted
    &lt;/Directory&gt;

    ErrorLog ${APACHE_LOG_DIR}/hospital-error.log
    CustomLog ${APACHE_LOG_DIR}/hospital-access.log combined
&lt;/VirtualHost&gt;</div>

    <h3>8.5.3 Permisos</h3>
    <div class="code-block"># Dar permisos de escritura
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache</div>

    <h2>8.6 Mantenimiento</h2>
    
    <h3>8.6.1 Backups</h3>
    <p>Realizar backups regulares de:</p>
    <ul>
        <li>Base de datos</li>
        <li>Archivos subidos (<span class="code">storage/app</span>)</li>
        <li>Archivo <span class="code">.env</span></li>
    </ul>

    <h3>8.6.2 Logs</h3>
    <p>Los logs se almacenan en <span class="code">storage/logs/laravel.log</span></p>

    <h3>8.6.3 Actualizaciones</h3>
    <div class="code-block"># Actualizar dependencias
composer update

# Ejecutar nuevas migraciones
php artisan migrate

# Limpiar cachés
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear</div>

    <h2>8.7 Troubleshooting</h2>
    
    <h3>Error 500</h3>
    <p>Verificar:</p>
    <ul>
        <li>Permisos de <span class="code">storage/</span> y <span class="code">bootstrap/cache/</span></li>
        <li>Configuración de <span class="code">.env</span></li>
        <li>Logs en <span class="code">storage/logs/</span></li>
    </ul>

    <h3>Error de Base de Datos</h3>
    <p>Verificar:</p>
    <ul>
        <li>Credenciales en <span class="code">.env</span></li>
        <li>Servidor MySQL activo</li>
        <li>Base de datos creada</li>
    </ul>

    <h3>Assets no se cargan</h3>
    <p>Ejecutar:</p>
    <div class="code-block">npm run build
php artisan view:clear</div>
</div>

<!-- APÉNDICES -->
<div class="section">
    <h1>Apéndices</h1>
    
    <h2>A. Comandos Artisan Útiles</h2>
    <table>
        <tr>
            <th>Comando</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td>php artisan list</td>
            <td>Lista todos los comandos disponibles</td>
        </tr>
        <tr>
            <td>php artisan migrate:status</td>
            <td>Muestra el estado de las migraciones</td>
        </tr>
        <tr>
            <td>php artisan route:list</td>
            <td>Lista todas las rutas registradas</td>
        </tr>
        <tr>
            <td>php artisan make:controller</td>
            <td>Crea un nuevo controlador</td>
        </tr>
        <tr>
            <td>php artisan make:model</td>
            <td>Crea un nuevo modelo</td>
        </tr>
        <tr>
            <td>php artisan make:migration</td>
            <td>Crea una nueva migración</td>
        </tr>
        <tr>
            <td>php artisan tinker</td>
            <td>Abre REPL de Laravel</td>
        </tr>
    </table>

    <h2>B. Variables de Entorno Importantes</h2>
    <table>
        <tr>
            <th>Variable</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td>APP_NAME</td>
            <td>Nombre de la aplicación</td>
        </tr>
        <tr>
            <td>APP_ENV</td>
            <td>Entorno (local/production)</td>
        </tr>
        <tr>
            <td>APP_DEBUG</td>
            <td>Modo debug (true/false)</td>
        </tr>
        <tr>
            <td>APP_URL</td>
            <td>URL base de la aplicación</td>
        </tr>
        <tr>
            <td>DB_*</td>
            <td>Configuración de base de datos</td>
        </tr>
    </table>

    <h2>C. Contacto y Soporte</h2>
    <p>Para soporte técnico o consultas sobre el desarrollo:</p>
    <ul>
        <li><strong>Departamento de Sistemas</strong></li>
        <li><strong>Hospital Virgen Del Valle</strong></li>
    </ul>

    <div class="note">
        <strong>Versión del Manual:</strong> 1.0 - Enero 2026
    </div>
</div>

</body>
</html>
