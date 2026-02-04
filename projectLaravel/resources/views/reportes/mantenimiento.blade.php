@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Reporte de Mantenimientos</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Historial completo de intervenciones (Bienes Nacionales y Aires Acondicionados)</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('reportes.pdf', 'mantenimiento') }}" class="group relative inline-flex items-center justify-center p-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 overflow-hidden" title="Descargar PDF">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <svg class="w-6 h-6 relative z-10 bg-amber-600" style="color:rgb(217, 119, 6);" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </a>
            <a href="{{ route('reportes') }}" class="group relative inline-flex items-center justify-center p-3 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold rounded-xl shadow-lg hover:shadow-xl border-2 border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500 transform hover:-translate-y-0.5 transition-all duration-200" title="Volver">
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1 text-gray-800 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
        <!-- Contenedor con scroll vertical -->
        <div class="relative w-full overflow-x-auto overflow-y-auto" style="max-height: 520px;">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase text-xs border-b border-gray-200 dark:border-gray-600">
                    <tr>
                        <th class="px-6 py-4 sticky top-0 bg-gray-50 dark:bg-gray-700 z-10 shadow-sm">Equipo</th>
                        <th class="px-6 py-4 sticky top-0 bg-gray-50 dark:bg-gray-700 z-10 shadow-sm">Descripción</th>
                        <th class="px-6 py-4 sticky top-0 bg-gray-50 dark:bg-gray-700 z-10 shadow-sm">Ubicación</th>
                        <th class="px-6 py-4 sticky top-0 bg-gray-50 dark:bg-gray-700 z-10 shadow-sm">Tipo</th>
                        <th class="px-6 py-4 sticky top-0 bg-gray-50 dark:bg-gray-700 z-10 shadow-sm">Fecha</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($mantenimientos as $mant)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $mant->titulo }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $mant->descripcion }}</td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $mant->ubicacion }}</td>
                        <td class="px-6 py-4">
                            @php
                                $isPreventive = stripos($mant->tipo, 'Preventivo') !== false || stripos($mant->titulo, 'Preventivo') !== false;
                                $colorClass = $isPreventive 
                                    ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-200' 
                                    : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200';
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $colorClass }}">
                                {{ $mant->tipo }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-500">{{ $mant->fecha->format('d/m/Y h:i A') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 2.758-1.741 2.758H12m0 0l-5 5m5-5v6"></path>
                            </svg>
                            <p class="mt-2 text-sm">No hay reportes de mantenimiento registrados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 mb-8 text-sm text-gray-600 dark:text-gray-400">
        Total de registros mostrados: {{ $mantenimientos->count() }}
    </div>
</div>
@endsection
