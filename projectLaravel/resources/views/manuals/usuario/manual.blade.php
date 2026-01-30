<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual de Usuario - Sistema de Control Hospital</title>
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
            color: #2563eb;
            font-size: 24pt;
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 3px solid #2563eb;
        }
        h2 {
            color: #1e40af;
            font-size: 18pt;
            margin-top: 20px;
            margin-bottom: 10px;
            page-break-after: avoid;
        }
        h3 {
            color: #3b82f6;
            font-size: 14pt;
            margin-top: 15px;
            margin-bottom: 8px;
        }
        h4 {
            color: #60a5fa;
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
        .note {
            background-color: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 10px 15px;
            margin: 15px 0;
        }
        .warning {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 10px 15px;
            margin: 15px 0;
        }
        .step {
            margin: 10px 0 10px 20px;
        }
        .step-number {
            font-weight: bold;
            color: #2563eb;
        }
        ul, ol {
            margin: 10px 0 10px 25px;
        }
        li {
            margin: 5px 0;
        }
        .code {
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eff6ff;
            color: #1e40af;
            font-weight: bold;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 9pt;
            color: #888;
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
        <div class="subtitle">Manual de Usuario</div>
        <div class="subtitle">Hospital Virgen Del Valle</div>
        <div class="info">
            <p>Versión 1.0</p>
            <p>Enero 2026</p>
        </div>
    </div>
</div>

<!-- ÍNDICE -->
<div class="section">
    <h1>Índice</h1>
    <ol>
        <li>Introducción</li>
        <li>Acceso al Sistema</li>
        <li>Módulo Dashboard</li>
        <li>Módulo Bienes Nacionales</li>
        <li>Módulo Aires Acondicionados</li>
        <li>Módulo Reportes</li>
        <li>Configuración del Sistema</li>
    </ol>
</div>

<!-- 1. INTRODUCCIÓN -->
<div class="section">
    <h1>1. Introducción</h1>
    
    <h2>1.1 Propósito del Sistema</h2>
    <p>
        El Sistema de Control Hospital es una aplicación web diseñada para gestionar y controlar los activos del Hospital Virgen Del Valle, 
        con especial énfasis en bienes nacionales y equipos de aire acondicionado. El sistema permite llevar un registro detallado de cada 
        activo, su ubicación, estado, mantenimientos realizados y generar reportes completos.
    </p>

    <h2>1.2 Audiencia Objetivo</h2>
    <p>Este manual está dirigido a:</p>
    <ul>
        <li>Personal administrativo encargado de la gestión de activos</li>
        <li>Técnicos responsables del mantenimiento de equipos</li>
        <li>Supervisores y jefes de área</li>
        <li>Personal autorizado con acceso al sistema</li>
    </ul>

    <h2>1.3 Convenciones del Documento</h2>
    <div class="note">
        <strong>Nota:</strong> Las notas proporcionan información adicional importante.
    </div>
    <div class="warning">
        <strong>Advertencia:</strong> Las advertencias indican precauciones que deben tomarse.
    </div>
    <p>Los elementos de interfaz se muestran en <span class="code">formato código</span>.</p>
</div>

<!-- 2. ACCESO AL SISTEMA -->
<div class="section">
    <h1>2. Acceso al Sistema</h1>
    
    <h2>2.1 Requisitos del Sistema</h2>
    <p>Para acceder al sistema necesita:</p>
    <ul>
        <li>Navegador web moderno (Chrome, Firefox, Edge, Safari)</li>
        <li>Conexión a internet o red interna del hospital</li>
        <li>Credenciales de acceso proporcionadas por el administrador</li>
    </ul>

    <h2>2.2 Inicio de Sesión</h2>
    <div class="step">
        <p><span class="step-number">Paso 1:</span> Abra su navegador web e ingrese la URL del sistema</p>
        <p><span class="step-number">Paso 2:</span> Ingrese su nombre de usuario en el campo correspondiente</p>
        <p><span class="step-number">Paso 3:</span> Ingrese su contraseña</p>
        <p><span class="step-number">Paso 4:</span> Haga clic en el botón "Iniciar Sesión"</p>
    </div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/11_login.png') }}" style="width: 80%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <div class="note">
        <strong>Nota:</strong> Si olvida su contraseña, contacte al administrador del sistema para restablecerla.
    </div>

    <h2>2.3 Navegación General</h2>
    <p>El sistema cuenta con una barra de navegación lateral que permite acceder a los diferentes módulos:</p>
    <ul>
        <li><strong>Dashboard:</strong> Vista general con estadísticas</li>
        <li><strong>Bienes Nacionales:</strong> Gestión de activos generales</li>
        <li><strong>Aires Acondicionados:</strong> Gestión de equipos AC</li>
        <li><strong>Reportes:</strong> Generación de reportes</li>
        <li><strong>Configuración:</strong> Ajustes del sistema</li>
    </ul>

    <h2>2.4 Modo Oscuro</h2>
    <p>El sistema incluye un modo oscuro para reducir la fatiga visual. Para activarlo:</p>
    <div class="step">
        <p><span class="step-number">1.</span> Haga clic en el ícono de sol/luna en la barra superior</p>
        <p><span class="step-number">2.</span> El sistema cambiará automáticamente entre modo claro y oscuro</p>
    </div>
</div>

<!-- 3. MÓDULO DASHBOARD -->
<div class="section">
    <h1>3. Módulo Dashboard</h1>
    
    <h2>3.1 Vista General</h2>
    <p>
        El Dashboard proporciona una vista rápida del estado general del sistema, mostrando estadísticas clave y 
        gráficos que permiten tomar decisiones informadas.
    </p>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/01_dashboard.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>3.2 Tarjetas de Resumen</h2>
    <p>En la parte superior se muestran tarjetas con información resumida:</p>
    <ul>
        <li><strong>Total de Bienes:</strong> Cantidad total de bienes nacionales registrados</li>
        <li><strong>Aires Acondicionados:</strong> Cantidad total de equipos AC</li>
        <li><strong>Mantenimientos Pendientes:</strong> Equipos que requieren mantenimiento</li>
        <li><strong>Reportes del Mes:</strong> Cantidad de reportes generados en el mes actual</li>
    </ul>

    <h2>3.3 Gráficos y Estadísticas</h2>
    <p>El dashboard incluye varios gráficos interactivos:</p>
    <ul>
        <li><strong>Distribución por Área:</strong> Muestra cómo están distribuidos los bienes por área</li>
        <li><strong>Estado de Equipos:</strong> Indica cuántos equipos están operativos, en mantenimiento o fuera de servicio</li>
        <li><strong>Tendencias de Mantenimiento:</strong> Muestra la frecuencia de mantenimientos en el tiempo</li>
    </ul>
</div>

<!-- 4. MÓDULO BIENES NACIONALES -->
<div class="section">
    <h1>4. Módulo Bienes Nacionales</h1>
    
    <h2>4.1 Listar Bienes</h2>
    <p>
        La vista principal muestra una tabla con todos los bienes nacionales registrados. Cada fila incluye información básica 
        como número de bien, descripción, área y estado.
    </p>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/02_bienes_lista.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h3>4.1.1 Búsqueda y Filtros</h3>
    <p>Para buscar un bien específico:</p>
    <div class="step">
        <p><span class="step-number">1.</span> Use el campo de búsqueda en la parte superior</p>
        <p><span class="step-number">2.</span> Ingrese el número de bien, descripción o cualquier dato relevante</p>
        <p><span class="step-number">3.</span> Los resultados se filtrarán automáticamente</p>
    </div>

    <h2>4.2 Agregar Nuevo Bien</h2>
    <div class="step">
        <p><span class="step-number">Paso 1:</span> Haga clic en el botón "Agregar Bien"</p>
        <p><span class="step-number">Paso 2:</span> Complete el formulario con la información requerida:</p>
        <ul>
            <li>Número de Bien Nacional (obligatorio)</li>
            <li>Descripción del bien</li>
            <li>Área asignada</li>
            <li>Categoría</li>
            <li>Estado actual</li>
            <li>Observaciones (opcional)</li>
        </ul>
        <p><span class="step-number">Paso 3:</span> Haga clic en "Guardar"</p>
    </div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/03_agregar_bien.png') }}" style="width: 70%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <div class="warning">
        <strong>Advertencia:</strong> El número de bien nacional debe ser único. El sistema no permitirá duplicados.
    </div>

    <h2>4.3 Ver Detalles de Bien</h2>
    <p>Para ver información completa de un bien:</p>
    <div class="step">
        <p><span class="step-number">1.</span> Haga clic en el botón "Ver" en la fila correspondiente</p>
        <p><span class="step-number">2.</span> Se abrirá un modal con toda la información del bien</p>
        <p><span class="step-number">3.</span> Desde aquí puede:</p>
        <ul>
            <li>Ver el código QR del bien</li>
            <li>Exportar la información a PDF</li>
            <li>Ver el historial de reportes</li>
            <li>Editar la información</li>
        </ul>
    </div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/04_ver_bien.png') }}" style="width: 70%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>4.4 Editar Bien</h2>
    <div class="step">
        <p><span class="step-number">1.</span> Abra los detalles del bien</p>
        <p><span class="step-number">2.</span> Haga clic en "Editar Bien"</p>
        <p><span class="step-number">3.</span> Modifique los campos necesarios</p>
        <p><span class="step-number">4.</span> Haga clic en "Guardar Cambios"</p>
    </div>

    <h2>4.5 Historial de Reportes</h2>
    <p>Cada bien mantiene un historial completo de todos los reportes asociados:</p>
    <ul>
        <li><strong>Asignación:</strong> Cuando el bien es asignado a un área</li>
        <li><strong>Desincorporación:</strong> Cuando el bien es dado de baja</li>
        <li><strong>Traslado:</strong> Cuando el bien cambia de ubicación</li>
        <li><strong>Otro:</strong> Reportes generales</li>
    </ul>

    <h3>4.5.1 Ver Historial</h3>
    <div class="step">
        <p><span class="step-number">1.</span> En los detalles del bien, haga clic en "Ver Historial"</p>
        <p><span class="step-number">2.</span> Se mostrará una lista cronológica de todos los reportes</p>
        <p><span class="step-number">3.</span> Puede filtrar por:</p>
        <ul>
            <li>Rango de fechas</li>
            <li>Tipo de actividad</li>
        </ul>
        <p><span class="step-number">4.</span> Puede exportar el historial filtrado a PDF</p>
    </div>

    <h2>4.6 Generar Código QR</h2>
    <p>Cada bien tiene un código QR único que facilita su identificación:</p>
    <div class="step">
        <p><span class="step-number">1.</span> Abra los detalles del bien</p>
        <p><span class="step-number">2.</span> El código QR se muestra automáticamente</p>
        <p><span class="step-number">3.</span> Puede descargarlo o imprimirlo desde el PDF del bien</p>
    </div>

    <h2>4.7 Eliminar Bien</h2>
    <div class="warning">
        <strong>Advertencia:</strong> Esta acción es permanente y no se puede deshacer.
    </div>
    <div class="step">
        <p><span class="step-number">1.</span> Haga clic en el botón "Eliminar" en la fila del bien</p>
        <p><span class="step-number">2.</span> Confirme la acción en el diálogo que aparece</p>
        <p><span class="step-number">3.</span> El bien será eliminado permanentemente</p>
    </div>
</div>

<!-- 5. MÓDULO AIRES ACONDICIONADOS -->
<div class="section">
    <h1>5. Módulo Aires Acondicionados</h1>
    
    <h2>5.1 Vista General</h2>
    <p>
        Este módulo está diseñado específicamente para la gestión de equipos de aire acondicionado, 
        permitiendo un control detallado de su mantenimiento, reparaciones y estado operativo.
    </p>

    <h2>5.2 Listar Equipos AC</h2>
    <p>
        La vista principal muestra tarjetas visuales con información clave de cada equipo:
    </p>
    <ul>
        <li>Estado actual</li>
        <li>Horas de uso acumuladas</li>
    </ul>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/05_aires_tarjetas.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>5.3 Agregar Nuevo Equipo AC</h2>
    <div class="step">
        <p><span class="step-number">Paso 1:</span> Haga clic en "Agregar AC"</p>
        <p><span class="step-number">Paso 2:</span> Complete la información del equipo:</p>
    </div>
    
    <h3>Información General:</h3>
    <ul>
        <li>Nombre del equipo</li>
        <li>Ubicación/Área</li>
        <li>Capacidad (toneladas)</li>
        <li>Estado inicial</li>
    </ul>

    <h3>Información Técnica:</h3>
    <ul>
        <li>Marca</li>
        <li>Modelo</li>
        <li>Número de serie</li>
        <li>Tipo de refrigerante</li>
        <li>Voltaje</li>
        <li>Amperaje</li>
        <li>Fecha de instalación</li>
    </ul>

    <h2>5.4 Ver Detalles del Equipo</h2>
    <p>El modal de detalles incluye dos pestañas:</p>
    
    <h3>5.4.1 Pestaña General</h3>
    <p>Muestra información básica del equipo y permite:</p>
    <ul>
        <li>Ver datos generales</li>
        <li>Ver estado actual</li>
        <li>Registrar mantenimiento</li>
        <li>Reportar fallas</li>
    </ul>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/06_ver_ac.png') }}" style="width: 70%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h3>5.4.2 Pestaña Técnica</h3>
    <p>Muestra especificaciones técnicas detalladas del equipo.</p>

    <h2>5.5 Registrar Mantenimiento</h2>
    <div class="step">
        <p><span class="step-number">1.</span> Abra los detalles del equipo</p>
        <p><span class="step-number">2.</span> Haga clic en "Registrar Mantenimiento"</p>
        <p><span class="step-number">3.</span> Complete el formulario:</p>
        </ul>
        <p><span class="step-number">4.</span> Haga clic en "Guardar"</p>
    </div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/07_registrar_mantenimiento.png') }}" style="width: 80%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>5.6 Gestión de Materiales</h2>
    <p>Durante el registro de mantenimiento, puede agregar materiales utilizados:</p>
    <div class="step">
        <p><span class="step-number">1.</span> En el formulario de mantenimiento, haga clic en "Agregar Material"</p>
        <p><span class="step-number">2.</span> Ingrese:</p>
        <ul>
            <li>Nombre del material</li>
            <li>Cantidad utilizada</li>
            <li>Costo (opcional)</li>
        </ul>
        <p><span class="step-number">3.</span> El material se agregará a la lista</p>
    </div>

    <h2>5.7 Historial de Vida del Equipo</h2>
    <p>Cada equipo mantiene un historial completo de:</p>
    <ul>
        <li><strong>Cambios de Estado:</strong> Operativo, Mantenimiento, Fuera de Servicio</li>
        <li><strong>Mantenimientos:</strong> Preventivos y correctivos realizados</li>
        <li><strong>Reparaciones:</strong> Fallas reportadas y reparadas</li>
    </ul>

    <h3>5.7.1 Ver Historial</h3>
    <div class="step">
        <p><span class="step-number">1.</span> Haga clic en "Ver Historial" en la tarjeta del equipo</p>
        <p><span class="step-number">2.</span> Se abrirá un modal con el historial completo</p>
        <p><span class="step-number">3.</span> Puede filtrar por:</p>
        <ul>
            <li>Rango de fechas</li>
            <li>Tipo de actividad</li>
        </ul>
        </ul>
        <p><span class="step-number">4.</span> Puede exportar el historial a PDF</p>
    </div>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/08_historial_ac.png') }}" style="width: 80%; border: 1px solid #ddd; border-radius: 4px;">
    </div>

    <h2>5.8 Editar Equipo</h2>
    <div class="step">
        <p><span class="step-number">1.</span> Abra los detalles del equipo</p>
        <p><span class="step-number">2.</span> Haga clic en "Editar Equipo"</p>
        <p><span class="step-number">3.</span> Modifique la información necesaria</p>
        <p><span class="step-number">4.</span> Guarde los cambios</p>
    </div>

    <h2>5.9 Eliminar Equipo</h2>
    <div class="warning">
        <strong>Advertencia:</strong> Al eliminar un equipo, se eliminará también todo su historial.
    </div>
    <div class="step">
        <p><span class="step-number">1.</span> Haga clic en "Eliminar" en la tarjeta del equipo</p>
        <p><span class="step-number">2.</span> Confirme la acción</p>
    </div>
</div>

<!-- 6. MÓDULO REPORTES -->
<div class="section">
    <h1>6. Módulo Reportes</h1>
    
    <h2>6.1 Tipos de Reportes</h2>
    <p>El sistema ofrece tres tipos de reportes principales:</p>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/09_reportes.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <h3>6.1.1 Reporte General</h3>
    <p>Incluye un resumen completo de todos los bienes nacionales y equipos AC registrados en el sistema.</p>

    <h3>6.1.2 Reporte de Aires Acondicionados</h3>
    <p>Detalla específicamente los equipos de aire acondicionado, su estado y mantenimientos.</p>

    <h3>6.1.3 Reporte Analítico</h3>
    <p>Proporciona análisis estadísticos y gráficos sobre el uso y estado de los activos.</p>

    <h2>6.2 Generar Reporte</h2>
    <div class="step">
        <p><span class="step-number">1.</span> Seleccione el tipo de reporte deseado</p>
        <p><span class="step-number">2.</span> Configure los filtros si están disponibles:</p>
        <ul>
            <li>Rango de fechas</li>
            <li>Área específica</li>
            <li>Estado de equipos</li>
        </ul>
        <p><span class="step-number">3.</span> Haga clic en "Generar Reporte"</p>
        <p><span class="step-number">4.</span> El reporte se mostrará en pantalla</p>
    </div>

    <h2>6.3 Exportar a PDF</h2>
    <p>Todos los reportes pueden exportarse a formato PDF:</p>
    <div class="step">
        <p><span class="step-number">1.</span> Genere el reporte deseado</p>
        <p><span class="step-number">2.</span> Haga clic en "Descargar PDF"</p>
        <p><span class="step-number">3.</span> El archivo PDF se descargará automáticamente</p>
    </div>

    <div class="note">
        <strong>Nota:</strong> Los PDFs incluyen el logo del hospital y están formateados profesionalmente.
    </div>
</div>

<!-- 7. CONFIGURACIÓN -->
<div class="section">
    <h1>7. Configuración del Sistema</h1>
    
    <h2>7.1 Gestión de Áreas</h2>
    <p>Permite administrar las áreas del hospital donde se ubican los activos.</p>
    <div style="text-align: center; margin: 20px 0;">
        <img src="{{ public_path('images/manuals/10_configuracion.png') }}" style="width: 100%; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <h3>7.1.1 Agregar Área</h3>
    <div class="step">
        <p><span class="step-number">1.</span> Vaya a Configuración → Áreas</p>
        <p><span class="step-number">2.</span> Haga clic en "Agregar Área"</p>
        <p><span class="step-number">3.</span> Ingrese el nombre del área</p>
        <p><span class="step-number">4.</span> Guarde los cambios</p>
    </div>

    <h3>7.1.2 Editar/Eliminar Área</h3>
    <p>Use los botones correspondientes en la lista de áreas.</p>

    <h2>7.2 Gestión de Categorías</h2>
    <p>Permite administrar las categorías de bienes nacionales.</p>
    <div class="step">
        <p><span class="step-number">1.</span> Vaya a Configuración → Categorías</p>
        <p><span class="step-number">2.</span> Agregue, edite o elimine categorías según sea necesario</p>
    </div>

    <h2>7.3 Preferencias del Sistema</h2>
    <p>Configure opciones generales del sistema:</p>
    <ul>
        <li>Tema predeterminado (Claro/Oscuro)</li>
        <li>Idioma de la interfaz</li>
        <li>Formato de fechas</li>
    </ul>
</div>

<!-- SOPORTE Y CONTACTO -->
<div class="section">
    <h1>Soporte y Contacto</h1>
    
    <h2>Asistencia Técnica</h2>
    <p>Para soporte técnico o reportar problemas, contacte a:</p>
    <ul>
        <li><strong>Departamento de Sistemas</strong></li>
        <li><strong>Hospital Virgen Del Valle</strong></li>
    </ul>

    <h2>Actualizaciones del Manual</h2>
    <p>
        Este manual se actualiza periódicamente. Asegúrese de consultar la versión más reciente 
        disponible en el sistema.
    </p>

    <div class="note">
        <strong>Versión del Manual:</strong> 1.0 - Enero 2026
    </div>
</div>

</body>
</html>
