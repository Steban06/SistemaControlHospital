@extends('layouts.app')

@section('title', 'Inicio - Sistema de Control Hospital')

@section('content')
<div class="p-4 lg:p-6 space-y-4 lg:space-y-6 flex-1">

    <!-- Main Metrics Grid (Compact) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        <!-- Card 1 -->
        <div onclick="showSummaryAlert()" data-slot="card" class="bg-white text-slate-800 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all cursor-pointer p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-emerald-50 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-emerald-100 rounded-md text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package">
                        <path d="m7.5 4.27 9 5.15" />
                        <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                        <path d="m3.3 7 8.7 5 8.7-5" />
                        <path d="M12 22v-9" />
                    </svg>
                </div>
                <div class="flex items-center gap-1 text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                        <polyline points="16 7 22 7 22 13" />
                    </svg>
                    +12%
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 leading-tight">{{ number_format($bienesOperativos) }}</p>
                <p class="text-xs text-slate-500 font-medium mt-0.5">Bienes Operativos</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div data-slot="card" class="bg-white text-slate-800 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-amber-50 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-amber-100 rounded-md text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                    </svg>
                </div>
                <div class="flex items-center gap-1 text-xs font-medium text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full border border-amber-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" x2="12" y1="8" y2="12" />
                        <line x1="12" x2="12.01" y1="16" y2="16" />
                    </svg>
                    8 Pend.
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 leading-tight">{{ number_format($bienesEnReparacion) }}</p>
                <p class="text-xs text-slate-500 font-medium mt-0.5">Bienes En Mantenimiento</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div data-slot="card" class="bg-white text-slate-800 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-red-100 rounded-md text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m4.9 4.9 14.2 14.2" />
                    </svg>
                </div>
                <div class="flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 px-2 py-0.5 rounded-full border border-red-100">
                    +3 Fallas
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 leading-tight">{{ number_format($bienesDanados) }}</p>
                <p class="text-xs text-slate-500 font-medium mt-0.5">Bienes Fuera de Servicio</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div data-slot="card" class="bg-white text-slate-800 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-slate-50 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-slate-100 rounded-md text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive">
                        <rect width="20" height="5" x="2" y="3" rx="1" />
                        <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8" />
                        <path d="M10 12h4" />
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 leading-tight">{{ number_format($bienesDesincorporados) }}</p>
                <p class="text-xs text-slate-500 font-medium mt-0.5">Bienes Desincorporados</p>
            </div>
        </div>
    </div>

    <!-- AC Statistics Section (New) -->
    <div class="mt-4 grid grid-cols-1 xl:grid-cols-2 gap-6">
        <!-- AC Section -->
        <div>
            <h4 class="text-sm font-bold text-slate-700 uppercase tracking-wide mb-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake text-blue-500">
                    <line x1="2" x2="22" y1="12" y2="12" />
                    <line x1="12" x2="12" y1="2" y2="22" />
                    <path d="m20 16-4-4 4-4" />
                    <path d="m4 8 4 4-4 4" />
                    <path d="m16 4-4 4-4-4" />
                    <path d="m8 20 4-4 4 4" />
                </svg>
                Estado de Climatización
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <!-- AC Stat 1 -->
                <div class="bg-blue-50/50 border border-blue-100 rounded-lg p-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-blue-600 font-semibold uppercase">Total Equipos</p>
                        <p class="text-xl font-bold text-slate-800">{{ $acTotal ?? 0 }}</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake">
                            <line x1="2" x2="22" y1="12" y2="12" />
                            <line x1="12" x2="12" y1="2" y2="22" />
                            <path d="m20 16-4-4 4-4" />
                            <path d="m4 8 4 4-4 4" />
                            <path d="m16 4-4 4-4-4" />
                            <path d="m8 20 4-4 4 4" />
                        </svg>
                    </div>
                </div>
                <!-- AC Stat 2 -->
                <div class="bg-emerald-50/50 border border-emerald-100 rounded-lg p-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-emerald-600 font-semibold uppercase">Operativos</p>
                        <p class="text-xl font-bold text-slate-800">{{ $acOperativos ?? 0 }}</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind">
                            <path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2" />
                            <path d="M9.6 4.6A2 2 0 1 1 11 8H2" />
                            <path d="M12.6 19.4A2 2 0 1 0 14 16H2" />
                        </svg>
                    </div>
                </div>
                <!-- AC Stat 3 -->
                <div class="bg-red-50/50 border border-red-100 rounded-lg p-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-red-600 font-semibold uppercase">Criticos/Falla</p>
                        <p class="text-xl font-bold text-slate-800">{{ $acCriticos ?? 0 }}</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-thermometer">
                            <path d="M14 4v10.54a4 4 0 1 1-2.91 1 4 4 0 0 1 .91-.54V4a1 1 0 0 1 2 0Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- General Stats Section -->
        <div>
            <h4 class="text-sm font-bold text-slate-700 uppercase tracking-wide mb-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard text-slate-500">
                    <rect width="7" height="9" x="3" y="3" rx="1" />
                    <rect width="7" height="5" x="14" y="3" rx="1" />
                    <rect width="7" height="9" x="14" y="12" rx="1" />
                    <rect width="7" height="5" x="3" y="16" rx="1" />
                </svg>
                Resumen General
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <!-- Total Bienes -->
                <div class="bg-violet-50 border border-violet-100 rounded-lg p-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-violet-600 font-semibold uppercase">Total Bienes</p>
                        <p class="text-xl font-bold text-slate-800">{{ $totalBienes ?? 0 }}</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-violet-100 flex items-center justify-center text-violet-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layers">
                            <path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z" />
                            <path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65" />
                            <path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65" />
                        </svg>
                    </div>
                </div>
                
                <!-- Total Categorías -->
                <div class="bg-green-50 border border-green-100 rounded-lg p-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-green-600 font-semibold uppercase">Categorías</p>
                        <p class="text-xl font-bold text-slate-800">{{ $totalCategorias ?? 0 }}</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tags">
                            <path d="m15 5 6.3 6.3a2.4 2.4 0 0 1 0 3.4L14.7 21.3a2.4 2.4 0 0 1-3.4 0L5 15" />
                            <path d="M9 9h.01" />
                            <path d="M4 9a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2Z" />
                        </svg>
                    </div>
                </div>
                
                <!-- Pendientes -->
                <div class="bg-amber-50/50 border border-amber-100 rounded-lg p-3 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-amber-600 font-semibold uppercase">Mant. Pendientes</p>
                        <p class="text-xl font-bold text-slate-800">{{ $totalPendientes ?? 0 }}</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenedor de dos graficas -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">

        <!-- Grafica 1 -->
        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity w-4 h-4 lg:w-5 lg:h-5 text-blue-600">
                        <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                    </svg>Tendencias Mensuales</h4>
                <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm">Actividad de bienes en los últimos 6 meses</p>
            </div>

            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                <div class="recharts-responsive-container lg:h-[300px]" style="width: 100%; height: 250px; min-width: 0px;">
                    <div id="curve_chart" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
        </div>

        <!-- Grafica 2 -->
        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pie-chart w-4 h-4 lg:w-5 lg:h-5 text-blue-600">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg>Distribución por Categoría
                </h4>
                <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm">Total de bienes y equipos por tipo</p>
            </div>

            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                <div class="recharts-responsive-container lg:h-[300px]" style="width: 100%; height: 250px; min-width: 0px;">
                    <div id="pie_chart" style="width: 100%; height: 100%;"></div>
                    <!-- TODO: Backend - Cargar conteo de bienes por categoría -->
                </div>
            </div>
        </div>
    </div>

    <!-- Grafica Ancha  -->
    <!-- <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4 lg:w-5 lg:h-5 text-blue-600">
                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                        <polyline points="16 7 22 7 22 13"></polyline>
                                    </svg>Bienes por Departamento</h4>
                                <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm">Distribución de bienes en los principales departamentos</p>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                <div class="recharts-responsive-container lg:h-[300px]" style="width: 100%; height: 250px; min-width: 0px;">
                                    <div class="recharts-wrapper" style="position: relative; cursor: default; width: 100%; height: 100%; max-height: 250px; max-width: 690px;">
                                         grafica de barras horizontales   
                                    </div>
                                </div>
                            </div>
                        </div> -->



</div>

<span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>

    @push('scripts')
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawCurveChart();
            drawPieChart();
        }

        function drawCurveChart() {
            var data = google.visualization.arrayToDataTable({!! $curveChartData !!});

            var options = {
                title: 'Movimiento de Bienes (Histórico Completo)',
                curveType: 'function',
                legend: { position: 'bottom' },
                backgroundColor: 'transparent',
                chartArea: {width: '85%', height: '70%'},
                hAxis: {
                    slantedText: true,
                    slantedTextAngle: 45,
                    textStyle: { fontSize: 11 }
                },
                // Habilitar Zoom y Desplazamiento interno
                explorer: { 
                    actions: ['dragToZoom', 'rightClickToReset'],
                    axis: 'horizontal',
                    keepInBounds: true,
                    maxZoomIn: 0.05
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }

        function drawPieChart() {
            var data = google.visualization.arrayToDataTable({!! $pieChartData !!});

            var options = {
            title: 'Distribución por Categoría',
            pieHole: 0.4,
            backgroundColor: 'transparent',
            chartArea: {width: '90%', height: '80%'},
            legend: {position: 'right', textStyle: {fontSize: 12}}
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }

        function showSummaryAlert() {
            Swal.fire({
            title: 'Resumen de Bienes',
            text: 'Actualmente hay 1,248 bienes operativos. El sistema está funcionando correctamente.',
            icon: 'info',
            confirmButtonText: 'Entendido'
            });
        }

        // Responsive redraw
        window.addEventListener('resize', drawCharts);
        </script>
    @endpush

@endsection