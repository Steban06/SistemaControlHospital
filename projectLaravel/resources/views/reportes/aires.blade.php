@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Reporte de Aires Acondicionados</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Listado completo de equipos de climatización</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('reportes.pdf', 'aires') }}" class="group relative inline-flex items-center justify-center p-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 overflow-hidden" title="Descargar PDF" style="color: red;">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <svg class="w-6 h-6 relative z-10" style="color:  #0d9488;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </a>
            <a href="{{ route('reportes') }}" class="group relative inline-flex items-center justify-center p-3 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold rounded-xl shadow-lg hover:shadow-xl border-2 border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500 transform hover:-translate-y-0.5 transition-all duration-200" title="Volver"   >
                <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1 text-gray-800 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
        <!-- Contenedor con scroll vertical -->
        <div class="relative w-full overflow-x-auto overflow-y-auto" style="max-height: 520px;">
            <table class="w-full text-sm text-left">
                <thead class="bg-teal-50 dark:bg-teal-900/30 text-teal-800 dark:text-teal-200 uppercase text-xs border-b border-teal-200 dark:border-teal-700">
                    <tr>
                        <th class="px-6 py-4 sticky top-0 bg-teal-50 dark:bg-teal-900/30 z-10 shadow-sm">Código BN</th>
                        <th class="px-6 py-4 sticky top-0 bg-teal-50 dark:bg-teal-900/30 z-10 shadow-sm">Nombre</th>
                        <th class="px-6 py-4 sticky top-0 bg-teal-50 dark:bg-teal-900/30 z-10 shadow-sm">Modelo</th>
                        <th class="px-6 py-4 sticky top-0 bg-teal-50 dark:bg-teal-900/30 z-10 shadow-sm">Capacidad</th>
                        <th class="px-6 py-4 sticky top-0 bg-teal-50 dark:bg-teal-900/30 z-10 shadow-sm">Voltaje</th>
                        <th class="px-6 py-4 sticky top-0 bg-teal-50 dark:bg-teal-900/30 z-10 shadow-sm">Estado</th>
                        <th class="px-6 py-4 sticky top-0 bg-teal-50 dark:bg-teal-900/30 z-10 shadow-sm">Ubicación</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($aires as $aire)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $aire->numero_bn }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $aire->nombre_aa ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $aire->modelo ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $aire->capacidad ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $aire->voltaje_rango ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $aire->estado == 'Operativo' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-200' : '' }}
                                {{ $aire->estado == 'Mantenimiento' ? 'bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-200' : '' }}
                                {{ $aire->estado == 'Fuera de Servicio' || $aire->estado == 'Dañado' ? 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200' : '' }}
                            ">
                                {{ $aire->estado ?? 'Desconocido' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $aire->bienNacional->area->nombre ?? 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2M9.6 4.6A2 2 0 1 1 11 8H2M12.6 19.4A2 2 0 1 0 14 16H2"></path>
                            </svg>
                            <p class="mt-2 text-sm">No hay aires acondicionados registrados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 mb-8 text-sm text-gray-600 dark:text-gray-400">
        Total de registros: {{ $aires->count() }}
    </div>
</div>
@endsection
