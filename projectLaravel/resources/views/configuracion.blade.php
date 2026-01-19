@extends('layouts.app')

@section('title', 'Configuración - Sistema de Control Hospital')

@section('content')
<div class="p-6">
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 bg-slate-100 rounded-lg text-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings">
                    <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.47a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Configuración del Sistema</h2>
                <p class="text-sm text-gray-500">Ajustes generales y preferencias.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card de ejemplo -->
            <div class="border rounded-lg p-4 hover:bg-slate-50 transition-colors cursor-pointer">
                <h3 class="font-medium text-gray-900 mb-2">Usuarios</h3>
                <p class="text-sm text-gray-500">Gestionar usuarios y permisos del sistema.</p>
            </div>
            
            <div class="border rounded-lg p-4 hover:bg-slate-50 transition-colors cursor-pointer">
                <h3 class="font-medium text-gray-900 mb-2">General</h3>
                <p class="text-sm text-gray-500">Información básica de la institución.</p>
            </div>
        </div>
    </div>
</div>
@endsection
