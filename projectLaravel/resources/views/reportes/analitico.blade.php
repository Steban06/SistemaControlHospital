@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Reporte Analítico</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Estadísticas y tendencias del inventario</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('reportes.pdf', 'analitico') }}" class="group relative inline-flex items-center justify-center p-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 overflow-hidden" title="Descargar PDF">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <svg class="w-6 h-6 relative z-10" style="color: #9333ea;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </a>
            <a href="{{ route('reportes') }}" class="group relative inline-flex items-center justify-center p-3 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold rounded-xl shadow-lg hover:shadow-xl border-2 border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500 transform hover:-translate-y-0.5 transition-all duration-200" title="Volver">
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1 text-gray-800 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Distribución por Estado -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4 flex items-center gap-2">
                <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 00-2-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Distribución por Estado
            </h3>
            
            @php
                $total = array_sum($estadoPorcentajes);
            @endphp

            <div class="space-y-4">
                @foreach($estadoPorcentajes as $estado => $cantidad)
                    @php
                        $porcentaje = $total > 0 ? round(($cantidad / $total) * 100, 1) : 0;
                        $colorClass = match($estado) {
                            'Operativo' => 'bg-emerald-500',
                            'Mantenimiento' => 'bg-amber-500',
                            'Fuera de Servicio' => 'bg-red-500',
                            'Desincorporado' => 'bg-gray-500',
                            default => 'bg-blue-500'
                        };
                    @endphp
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium text-gray-700 dark:text-gray-300">{{ $estado }}</span>
                            <span class="text-gray-600 dark:text-gray-400">{{ $cantidad }} ({{ $porcentaje }}%)</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="{{ $colorClass }} h-3 rounded-full transition-all duration-500" style="width: {{ $porcentaje }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex justify-between text-sm font-bold">
                    <span class="text-gray-900 dark:text-gray-100">Total de Bienes</span>
                    <span class="text-purple-600 dark:text-purple-400">{{ $total }}</span>
                </div>
            </div>
        </div>

        <!-- Top 5 Áreas con más Bienes -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4 flex items-center gap-2">
                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Top 5 Áreas con Más Bienes
            </h3>

            @php
                $maxBienes = $bienesPorArea->max('total') ?? 1;
            @endphp

            <div class="space-y-4">
                @forelse($bienesPorArea as $index => $item)
                    @php
                        $porcentaje = ($item->total / $maxBienes) * 100;
                        $colors = ['bg-blue-500', 'bg-indigo-500', 'bg-purple-500', 'bg-pink-500', 'bg-rose-500'];
                        $colorClass = $colors[$index % 5];
                    @endphp
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium text-gray-700 dark:text-gray-300">{{ $item->area->nombre ?? 'Sin Área' }}</span>
                            <span class="text-gray-600 dark:text-gray-400">{{ $item->total }} bienes</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div class="{{ $colorClass }} h-3 rounded-full transition-all duration-500" style="width: {{ $porcentaje }}%"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 dark:text-gray-400 py-8">No hay datos disponibles</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Resumen de Estadísticas -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach($estadoPorcentajes as $estado => $cantidad)
            @php
                $iconColor = match($estado) {
                    'Operativo' => 'text-emerald-600',
                    'Mantenimiento' => 'text-amber-600',
                    'Fuera de Servicio' => 'text-red-600',
                    'Desincorporado' => 'text-gray-600',
                    default => 'text-blue-600'
                };
                $bgColor = match($estado) {
                    'Operativo' => 'bg-emerald-100 dark:bg-emerald-900/30',
                    'Mantenimiento' => 'bg-amber-100 dark:bg-amber-900/30',
                    'Fuera de Servicio' => 'bg-red-100 dark:bg-red-900/30',
                    'Desincorporado' => 'bg-gray-100 dark:bg-gray-700',
                    default => 'bg-blue-100 dark:bg-blue-900/30'
                };
            @endphp
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $estado }}</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ $cantidad }}</p>
                    </div>
                    <div class="{{ $bgColor }} p-3 rounded-full">
                        <svg class="w-6 h-6 {{ $iconColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
