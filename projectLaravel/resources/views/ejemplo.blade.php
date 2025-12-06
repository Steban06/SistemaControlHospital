@extends('layouts.app')

@section('title', 'Página de Ejemplo - Sistema de Control Hospital')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Mensaje de Bienvenida -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold mb-4">Bienvenido al Sistema de Control Hospital</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    Esta es una página de ejemplo que utiliza el layout base creado siguiendo los estándares de Laravel.
                </p>
            </div>
        </div>

        <!-- Tarjetas de Información -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tarjeta 1 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Característica 1</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Descripción de la primera característica del sistema.
                    </p>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Característica 2</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Descripción de la segunda característica del sistema.
                    </p>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Característica 3</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Descripción de la tercera característica del sistema.
                    </p>
                </div>
            </div>
        </div>

        <!-- Sección de Información Adicional -->
        <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Información del Sistema</h2>
                <div class="space-y-3 text-gray-600 dark:text-gray-400">
                    <p>
                        <strong class="text-gray-900 dark:text-white">Layout Base:</strong> 
                        Esta vista utiliza el layout base ubicado en <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">resources/views/layouts/app.blade.php</code>
                    </p>
                    <p>
                        <strong class="text-gray-900 dark:text-white">Componentes:</strong> 
                        El header y footer se cargan automáticamente desde los partials.
                    </p>
                    <p>
                        <strong class="text-gray-900 dark:text-white">Estilos:</strong> 
                        Se utiliza Tailwind CSS para el diseño responsive y modo oscuro.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

