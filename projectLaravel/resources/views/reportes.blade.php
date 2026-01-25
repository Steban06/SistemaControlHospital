@extends('layouts.app')

@section('title', 'Reportes - Sistema de Control Hospital')

@section('content')
<div class="p-4 lg:p-6 space-y-6 flex-1">
    
    <!-- Generador de Reportes Personalizados (Visible Siempre) -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mt-6 mb-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg text-blue-600 dark:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sliders-horizontal"><line x1="21" x2="14" y1="4" y2="4"/><line x1="10" x2="3" y1="4" y2="4"/><line x1="21" x2="12" y1="12" y2="12"/><line x1="8" x2="3" y1="12" y2="12"/><line x1="21" x2="16" y1="20" y2="20"/><line x1="12" x2="3" y1="20" y2="20"/><line x1="14" x2="14" y1="2" y2="6"/><line x1="8" x2="8" y1="10" y2="14"/><line x1="16" x2="16" y1="18" y2="22"/></svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">Reportes Personalizados</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Filtre y genere reportes específicos por rango de fecha y departamento.</p>
            </div>
        </div>

        <form action="{{ route('reportes.custom') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Tipo de Reporte -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Reporte</label>
                    <select name="tipo" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="general">Instructivo General</option>
                        <option value="aires">Aires Acondicionados</option>
                        <option value="mantenimiento">Mantenimiento</option>
                        <option value="analitico">Analítico</option>
                    </select>
                </div>

                <!-- Departamento -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Departamento / Área</label>
                    <select name="area" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="todos">Todos los Departamentos</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Fecha Inicio -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Desde</label>
                    <input type="date" name="fecha_inicio" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <!-- Fecha Fin -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Hasta</label>
                    <input type="date" name="fecha_fin" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100 dark:border-gray-700">
                <button type="button" disabled class="px-4 py-2 text-sm font-medium text-emerald-600 bg-emerald-50 border border-emerald-200 rounded-lg cursor-not-allowed opacity-70 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-spreadsheet"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M8 13h2"/><path d="M14 13h2"/><path d="M8 17h2"/><path d="M14 17h2"/></svg>
                    Exportar Excel
                </button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-down"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M12 18v-6"/><path d="m9 15 3 3 3-3"/></svg>
                    Generar PDF
                </button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Tarjeta General -->
        <div id="card-general" onclick="selectReport('general')" data-slot="card" class="report-card bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg hover:border-blue-300 bg-white relative group">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 py-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-8 h-8 text-blue-600">
                        <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                        <path d="M12 22V12"></path>
                        <polyline points="3.29 7 12 12 20.71 7"></polyline>
                        <path d="m7.5 4.27 9 5.15"></path>
                    </svg>
                    <span id="badge-general" style="display: none;" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap bg-blue-600 text-white border-transparent">Seleccionado</span>
                </div>
                <h4 data-slot="card-title" class="text-base mt-2 font-semibold">Reporte General</h4>
                <p data-slot="card-description" class="text-muted-foreground text-sm text-gray-500 mb-2">Listado total de inventario</p>
            </div>
        </div>

        <!-- Tarjeta Ubicación (Ahora Aires) -->
        <div id="card-aires" onclick="selectReport('aires')" data-slot="card" class="report-card bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg hover:border-teal-300 bg-white">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 py-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-8 h-8 text-teal-600" style="color: #0d9488;">
                        <path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path>
                        <path d="M9.6 4.6A2 2 0 1 1 11 8H2"></path>
                        <path d="M12.6 19.4A2 2 0 1 0 14 16H2"></path>
                    </svg>
                    <span id="badge-aires" style="display: none;" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap bg-teal-600 text-white border-transparent">Seleccionado</span>
                </div>
                <h4 data-slot="card-title" class="text-base mt-2 font-semibold">Reporte Aires Acond.</h4>
                <p data-slot="card-description" class="text-muted-foreground text-sm text-gray-500 mb-2">Equipos de climatización</p>
            </div>
        </div>
        
        <!-- Tarjeta Mantenimiento -->
        <div id="card-mantenimiento" onclick="selectReport('mantenimiento')" data-slot="card" class="report-card bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg hover:border-amber-300 bg-white">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 py-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity w-8 h-8 text-amber-600">
                        <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                    </svg>
                    <span id="badge-mantenimiento" style="display: none;" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap bg-amber-600 text-white border-transparent">Seleccionado</span>
                </div>
                <h4 data-slot="card-title" class="text-base mt-2 font-semibold">Reporte Mantenimiento</h4>
                <p data-slot="card-description" class="text-muted-foreground text-sm text-gray-500 mb-2">Historial de reparaciones</p>
            </div>
        </div>

        <!-- Tarjeta Analítico -->
        <div id="card-analitico" onclick="selectReport('analitico')" data-slot="card" class="report-card bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg hover:border-purple-300 bg-white">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 py-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-column w-8 h-8 text-purple-600">
                        <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                        <path d="M18 17V9"></path>
                        <path d="M13 17V5"></path>
                        <path d="M8 17v-3"></path>
                    </svg>
                    <span id="badge-analitico" style="display: none;" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap bg-purple-600 text-white border-transparent">Seleccionado</span>
                </div>
                <h4 data-slot="card-title" class="text-base mt-2 font-semibold">Reporte Analítico</h4>
                <p data-slot="card-description" class="text-muted-foreground text-sm text-gray-500 mb-2">Estadísticas y gráficos</p>
            </div>
        </div>
    </div>

    <!-- CONTENEDORES DE REPORTE -->
    
    <!-- 1. Reporte General -->
    <div id="reporte-general" class="report-content hidden mt-8 transition-all duration-300 ease-in-out">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Inventario General (Últimos Registros)
                </h3>
                <a href="{{ route('reportes.general') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Ver Todos</a>
            </div>
            <div class="overflow-x-auto rounded-lg border border-gray-100 dark:border-gray-700">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-200 uppercase text-xs">
                        <tr><th class="px-4 py-3">Código</th><th class="px-4 py-3">Nombre</th><th class="px-4 py-3">Marca/Modelo</th><th class="px-4 py-3">Estado</th><th class="px-4 py-3">Ubicación</th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                        @forelse($bienesRecientes as $bien)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-4 py-3 font-medium">{{ $bien->numero_bn }}</td>
                            <td class="px-4 py-3">{{ $bien->nombre }}</td>
                            <td class="px-4 py-3">{{ $bien->marca }} {{ $bien->modelo }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $bien->estado == 'Operativo' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-200' : '' }}
                                    {{ $bien->estado == 'Mantenimiento' ? 'bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-200' : '' }}
                                    {{ $bien->estado == 'Fuera de Servicio' ? 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200' : '' }}
                                ">
                                    {{ $bien->estado }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $bien->area->nombre ?? 'Sin Asignar' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">No hay bienes registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    </div>
    </div>

    

    <!-- 2. Reporte Aires (Antes Ubicación) -->
    <div id="reporte-aires" class="report-content hidden mt-8 transition-all duration-300 ease-in-out">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                    <svg class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.6 4.6A2 2 0 1 1 11 8H2"></path></svg>
                    Aires Acondicionados Recientes
                </h3>
                <a href="{{ route('reportes.aires') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Ver Todos</a>
            </div>




            <div class="overflow-x-auto rounded-lg border border-gray-100 dark:border-gray-700">
                <table class="w-full text-sm text-left">
                    <thead class="bg-teal-50 dark:bg-teal-900/30 text-teal-800 dark:text-teal-200 uppercase text-xs">
                        <tr><th class="px-4 py-3">Ubicación</th><th class="px-4 py-3">Modelo</th><th class="px-4 py-3">Capacidad</th><th class="px-4 py-3">Estado</th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                        @forelse($airesRecientes as $aire)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-4 py-3 font-medium">{{ $aire->bienNacional->area->nombre ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $aire->modelo ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $aire->capacidad ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $aire->estado == 'Operativo' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-200' : '' }}
                                    {{ $aire->estado == 'Mantenimiento' ? 'bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-200' : '' }}
                                ">
                                    {{ $aire->estado ?? 'Desconocido' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-gray-500">No hay aires registrados o no se encontraron datos recientes.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 3. Reporte Mantenimiento -->
    <div id="reporte-mantenimiento" class="report-content hidden mt-8 transition-all duration-300 ease-in-out">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2 mb-4">
                <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 2.758-1.741 2.758H12m0 0l-5 5m5-5v6"></path></svg>
                Equipos en Alerta
            </h3>
            <div class="space-y-3">
                <div class="flex items-center p-3 rounded-lg border border-amber-200 bg-amber-50 dark:bg-amber-900/20 dark:border-amber-800">
                    <div class="h-3 w-3 rounded-full bg-amber-500 mr-3 animate-pulse"></div>
                    <div class="flex-1">
                        <h6 class="font-semibold text-sm text-gray-800 dark:text-gray-200">Tomógrafo - Sala 1</h6>
                        <p class="text-xs text-gray-500">Mantenimiento preventivo vencido hace 3 días</p>
                    </div>
                    <button class="text-xs bg-amber-100 text-amber-700 dark:bg-amber-800 dark:text-amber-200 px-3 py-1 rounded-md font-medium">Ver</button>
                </div>
                <div class="flex items-center p-3 rounded-lg border border-red-200 bg-red-50 dark:bg-red-900/20 dark:border-red-800">
                    <div class="h-3 w-3 rounded-full bg-red-500 mr-3"></div>
                    <div class="flex-1">
                        <h6 class="font-semibold text-sm text-gray-800 dark:text-gray-200">RX Portátil - Emergencia</h6>
                        <p class="text-xs text-gray-500">Falla de encendido reportada hoy</p>
                    </div>
                    <button class="text-xs bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200 px-3 py-1 rounded-md font-medium">Ver</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Reporte Analítico -->
    <div id="reporte-analitico" class="report-content hidden mt-8 transition-all duration-300 ease-in-out">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                    <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    Tendencias Mensuales
                </h3>
                <a href="{{ route('reportes.analitico') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Ver Análisis Completo</a>
            </div>
            <!-- Google Chart Container -->
            <div id="column_chart" class="w-full h-64 px-2"></div>
        </div>
    </div>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.load('current', {'packages':['corechart']});
        // No dibujar automáticamente al cargar, esperar a que sea visible
        // google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable({!! $tendenciasChartData !!});

            var isDark = document.documentElement.classList.contains('dark');
            var textColor = isDark ? '#cbd5e1' : '#64748b';
            var gridColor = isDark ? '#374151' : '#e5e7eb'; // gray-700 : gray-200

            var options = {
                title: 'Bienes registrados por mes',
                titleTextStyle: {
                    color: textColor,
                    fontSize: 14,
                    bold: false
                },
                backgroundColor: 'transparent',
                legend: { position: 'none' },
                chartArea: {width: '90%', height: '80%'},
                hAxis: {
                    textStyle: {color: textColor, fontSize: 11},
                    gridlines: {color: 'transparent'},
                    baselineColor: gridColor
                },
                vAxis: {
                    textStyle: {color: textColor, fontSize: 11},
                    gridlines: {color: gridColor},
                    baselineColor: gridColor,
                    minValue: 0,
                    format: '0' // Enteros
                },
                colors: ['#9333ea'], // Purple-600
                animation: {
                    startup: true,
                    duration: 1000,
                    easing: 'out'
                },
                bar: {groupWidth: "50%"}
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
            chart.draw(data, options);
        }

        // Redibujar al cambiar tamaño de ventana
        window.addEventListener('resize', drawChart);
    </script>


    <script>
        function selectReport(type) {
            const selectedCard = document.getElementById('card-' + type);
            const selectedContent = document.getElementById('reporte-' + type);
            
            // Verificar si ya tiene la clase ring-2
            const isAlreadySelected = selectedCard.classList.contains('ring-2');

            // Configuración de colores (HEX para asegurar aplicación)
            const config = {
                'general':       { color: '#2563eb' }, // blue-600
                'aires':         { color: '#0d9488' }, // teal-600
                'mantenimiento': { color: '#d97706' }, // amber-600
                'analitico':     { color: '#9333ea' }  // purple-600
            };
            
            // 1. Ocultar reportes y resetear tarjetas
            document.querySelectorAll('.report-content').forEach(el => el.classList.add('hidden'));
            
            document.querySelectorAll('.report-card').forEach(card => {
                // Quitar clases de selección
                card.classList.remove('ring-2');
                card.classList.add('border-gray-200', 'dark:border-gray-700');
                
                // Limpiar estilos inline forzados previamente
                card.style.borderColor = '';
                card.style.removeProperty('--tw-ring-color');
                
                // Ocultar badge
                const badge = card.querySelector('span[id^="badge-"]');
                if(badge) badge.style.display = 'none';
            });

            // 2. Si ya estaba seleccionada, terminamos (efecto toggle)
            if(isAlreadySelected) return; 

            // 3. Mostrar contenido seleccionado
            if(selectedContent) selectedContent.classList.remove('hidden');

            // 4. Activar estilos en tarjeta seleccionada
            if(selectedCard) {
                const color = config[type]?.color || '#2563eb';
                
                // Quitar borde gris por defecto
                selectedCard.classList.remove('border-gray-200', 'dark:border-gray-700');
                
                // Aplicar clase ring base
                selectedCard.classList.add('ring-2');
                
                // Forzar colores con estilos inline para máxima especificidad
                selectedCard.style.borderColor = color;
                selectedCard.style.setProperty('--tw-ring-color', color);
                
                // Configurar y mostrar badge
                const badge = document.getElementById('badge-' + type);
                if(badge) {
                    badge.style.display = 'inline-flex';
                    badge.style.backgroundColor = color;
                    badge.style.borderColor = color; // Por si tiene borde
                    badge.style.color = '#ffffff';
                }

                // Lógica específica
                if(type === 'analitico') {
                    setTimeout(() => {
                        if (typeof drawChart === 'function') drawChart();
                    }, 350);
                }
            }
        }
    </script>
    
    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0 bg-white">
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-5 h-5 text-blue-600">
                    <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                    <polyline points="16 7 22 7 22 13"></polyline>
                </svg>Resumen Rápido</h4>
            <p data-slot="card-description" class="text-muted-foreground text-gray-500">Estadísticas actuales del inventario</p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Bienes Operativos -->
                <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Bienes Operativos</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $operativos }}</p>
                    <div class="flex items-center justify-end">
                        <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&]:hover:bg-primary/90 bg-emerald-100 text-emerald-800 border-emerald-200 dark:bg-emerald-900/50 dark:text-emerald-200 dark:border-emerald-800">{{ $porcOperativos }}%</span>
                    </div>
                </div>
                
                <!-- En Mantenimiento -->
                <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">En Mantenimiento</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $mantenimiento }}</p>
                    <div class="flex items-center justify-end">
                        <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&]:hover:bg-primary/90 bg-amber-100 text-amber-800 border-amber-200 dark:bg-amber-900/50 dark:text-amber-200 dark:border-amber-800">{{ $porcMantenimiento }}%</span>
                    </div>
                </div>
                
                <!-- Fuera de Servicio -->
                <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Fuera de Servicio</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $fueraServicio }}</p>
                    <div class="flex items-center justify-end">
                        <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&]:hover:bg-primary/90 bg-red-100 text-red-800 border-red-200 dark:bg-red-900/50 dark:text-red-200 dark:border-red-800">{{ $porcFuera }}%</span>
                    </div>
                </div>
                
                <!-- Desincorporados -->
                <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Desincorporados</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $desincorporados }}</p>
                    <div class="flex items-center justify-end">
                        <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&]:hover:bg-primary/90 bg-purple-100 text-purple-800 border-purple-200 dark:bg-purple-200 dark:text-purple-900 dark:border-purple-300">{{ $porcDesinc }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0 bg-white">
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                    <path d="M10 9H8"></path>
                    <path d="M16 13H8"></path>
                    <path d="M16 17H8"></path>
                </svg>Reportes Generados Recientemente</h4>
            <p data-slot="card-description" class="text-muted-foreground text-gray-500">Historial de reportes descargables</p>
        </div>
        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="space-y-3">
                <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                <path d="M10 9H8"></path>
                                <path d="M16 13H8"></path>
                                <path d="M16 17H8"></path>
                            </svg></div>
                        <div>
                            <p class="font-medium text-gray-900">Inventario General - Diciembre 2025</p>
                            <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground bg-gray-100 text-gray-800">General</span><span class="text-sm text-gray-500">2026-01-05</span><span class="text-sm text-gray-400">2.4 MB</span></div>
                        </div>
                    </div><button data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" x2="12" y1="15" y2="3"></line>
                        </svg></button>
                </div>
                <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                <path d="M10 9H8"></path>
                                <path d="M16 13H8"></path>
                                <path d="M16 17H8"></path>
                            </svg></div>
                        <div>
                            <p class="font-medium text-gray-900">Valorización Anual 2025</p>
                            <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground bg-gray-100 text-gray-800">Financiero</span><span class="text-sm text-gray-500">2026-01-02</span><span class="text-sm text-gray-400">1.8 MB</span></div>
                        </div>
                    </div><button data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" x2="12" y1="15" y2="3"></line>
                        </svg></button>
                </div>
                <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                <path d="M10 9H8"></path>
                                <path d="M16 13H8"></path>
                                <path d="M16 17H8"></path>
                            </svg></div>
                        <div>
                            <p class="font-medium text-gray-900">Mantenimientos Q4 2025</p>
                            <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground bg-gray-100 text-gray-800">Mantenimiento</span><span class="text-sm text-gray-500">2025-12-28</span><span class="text-sm text-gray-400">1.2 MB</span></div>
                        </div>
                    </div><button data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" x2="12" y1="15" y2="3"></line>
                        </svg></button>
                </div>
                <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                <path d="M10 9H8"></path>
                                <path d="M16 13H8"></path>
                                <path d="M16 17H8"></path>
                            </svg></div>
                        <div>
                            <p class="font-medium text-gray-900">Análisis de Tendencias 2025</p>
                            <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground bg-gray-100 text-gray-800">Analítico</span><span class="text-sm text-gray-500">2025-12-20</span><span class="text-sm text-gray-400">3.1 MB</span></div>
                        </div>
                    </div><button data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" x2="12" y1="15" y2="3"></line>
                        </svg></button>
                </div>
            </div>
        </div>
    </div>
    
    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0 bg-white">
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-5 h-5 text-blue-600">
                    <path d="M8 2v4"></path>
                    <path d="M16 2v4"></path>
                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                    <path d="M3 10h18"></path>
                </svg>Reportes Programados</h4>
            <p data-slot="card-description" class="text-muted-foreground text-gray-500">Configure la generación automática de reportes</p>
        </div>
        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div dir="ltr" data-orientation="horizontal" data-slot="tabs" class="flex flex-col gap-2">
                <div role="tablist" aria-orientation="horizontal" data-slot="tabs-list" class="bg-muted text-muted-foreground h-9 items-center justify-center rounded-xl p-[3px] grid w-full grid-cols-3 bg-gray-100" tabindex="0" data-orientation="horizontal" style="outline: none;"><button type="button" role="tab" aria-selected="true" aria-controls="radix-:r3:-content-weekly" data-state="active" id="radix-:r3:-trigger-weekly" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4 bg-white shadow-sm text-gray-900" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Semanal</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r3:-content-monthly" data-state="inactive" id="radix-:r3:-trigger-monthly" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4 text-gray-500 hover:text-gray-900" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Mensual</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r3:-content-quarterly" data-state="inactive" id="radix-:r3:-trigger-quarterly" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4 text-gray-500 hover:text-gray-900" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Trimestral</button></div>
                <div data-state="active" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r3:-trigger-weekly" id="radix-:r3:-content-weekly" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 pt-4" style="animation-duration: 0s;">
                    <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-blue-900">Reporte Semanal de Inventario</p>
                                <p class="text-sm text-blue-700 mt-1">Cada lunes a las 8:00 AM</p>
                            </div><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&]:hover:bg-primary/90 bg-blue-600 text-white">Activo</span>
                        </div>
                    </div>
                </div>
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r3:-trigger-monthly" hidden="" id="radix-:r3:-content-monthly" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 pt-4"></div>
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r3:-trigger-quarterly" hidden="" id="radix-:r3:-content-quarterly" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 pt-4"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
