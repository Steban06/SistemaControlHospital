<header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-4 lg:px-6 py-3 lg:py-4 flex items-center justify-between shadow-sm transition-colors duration-300">
    <div class="flex items-center gap-2 lg:gap-4 flex-1 min-w-0">
        <button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-gray-600 hover:text-gray-900 lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-5 h-5">
                <line x1="4" x2="20" y1="12" y2="12"></line>
                <line x1="4" x2="20" y1="6" y2="6"></line>
                <line x1="4" x2="20" y1="18" y2="18"></line>
            </svg>
        </button>

        <button data-slot="button" class="items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-gray-600 hover:text-gray-900 hidden lg:flex">
            <svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-5 h-5">
                <line x1="4" x2="20" y1="12" y2="12"></line>
                <line x1="4" x2="20" y1="6" y2="6"></line>
                <line x1="4" x2="20" y1="18" y2="18"></line>
            </svg>
        </button>
        <div class="min-w-0">
            <h2 class="text-base lg:text-xl font-semibold text-gray-900 dark:text-gray-100 truncate">{{  $titleHeader  }}</h2>
            <p class="text-xs lg:text-sm text-gray-500 dark:text-gray-400 hidden sm:block truncate">Sistema de Gestión de Bienes Nacionales</p>
        </div>
    </div>

    <div class="flex items-center gap-2 flex-shrink-0">
        <!-- Theme Toggle -->
        <button id="theme-toggle" onclick="toggleTheme()" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 text-gray-500 hover:text-gray-900" title="Cambiar Tema">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon">
                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
            </svg>
        </button>

        <!-- Notifications -->
        <div class="relative" id="notifications-container">
            <button onclick="toggleNotifications()" class="inline-flex items-center justify-center whitespace-nowrap rounded-full w-10 h-10 transition-all hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none relative group" title="Notificaciones">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell group-hover:scale-105 transition-transform">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                </svg>
                <span class="absolute top-0 right-0 h-4 w-4 rounded-full bg-red-500 border border-white dark:border-gray-900 flex items-center justify-center text-[9px] font-bold text-white">3</span>
            </button>

            <!-- Dropdown Menu -->
            <div id="notifications-dropdown" class="hidden absolute right-0 mt-3 w-[480px] sm:w-[500px] bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-100 dark:border-gray-700/50 z-50 overflow-hidden ring-1 ring-black/5 mx-2 sm:mx-0">
                <!-- Header -->
                <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700/50 flex justify-between items-baseline bg-gray-50/50 dark:bg-gray-800/50 backdrop-blur-sm">
                    <h3 class="font-bold text-base text-gray-900 dark:text-gray-100">Notificaciones</h3>
                    <button class="text-xs text-blue-600 hover:text-blue-700 dark:text-blue-400 font-semibold hover:underline decoration-blue-600/30">
                        Marcar todo como leído
                    </button>
                </div>
                
                <!-- List -->
                <div class="max-h-[350px] overflow-y-auto custom-scrollbar p-3">
                    <!-- Item 1 (New) -->
                    <div class="flex gap-4 w-full px-4 py-3.5 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors border-b border-gray-100 dark:border-gray-700/50 cursor-pointer relative rounded-lg mb-2 group">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-amber-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 w-10 h-10 rounded-full flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start mb-1">
                                <p class="text-xs font-semibold text-gray-900 dark:text-gray-100 truncate">Mantenimiento Pendiente</p>
                                <span class="text-[9px] font-medium text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 px-1.5 py-0.5 rounded-full">Nuevo</span>
                            </div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-2 mb-1.5">El equipo de <strong>Aire Acondicionado Sala de Espera</strong> requiere su revisión trimestral programada.</p>
                            <p class="text-[10px] text-gray-400 font-medium">Hace 2 horas</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex gap-4 w-full px-4 py-3.5 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors border-b border-gray-100 dark:border-gray-700/50 cursor-pointer relative rounded-lg mb-2 group">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-red-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 w-10 h-10 rounded-full flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-cirecle"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start mb-1">
                                <p class="text-xs font-semibold text-gray-900 dark:text-gray-100 truncate">Stock Crítico</p>
                            </div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed mb-1.5">Quedan menos de 5 unidades de <strong>Filtros de Aire (Modelo X-200)</strong>.</p>
                            <p class="text-[10px] text-gray-400 font-medium">Ayer a las 14:30</p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex gap-4 w-full px-4 py-3.5 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer relative rounded-lg group">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 w-10 h-10 rounded-full flex items-center justify-center shrink-0 shadow-sm group-hover:scale-110 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-check"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="m9 15 2 2 4-4"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start mb-1">
                                <p class="text-xs font-semibold text-gray-900 dark:text-gray-100 truncate">Reporte Generado</p>
                            </div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed mb-1.5">El <strong>Reporte Mensual de Activos</strong> de Octubre ha sido generado.</p>
                            <p class="text-[10px] text-gray-400 font-medium">Hace 1 día</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-3 dark:bg-transparent border-t border-gray-100 dark:border-gray-700/50 text-center">
                    <a href="{{ route('notificaciones.index') }}" class="inline-flex items-center justify-center text-sm font-semibold text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 w-full hover:bg-blue-50 dark:hover:bg-blue-900/30 py-1.5 rounded-lg transition-colors">
                        Ver todas las notificaciones
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            
             <script>
                function toggleNotifications() {
                    const dropdown = document.getElementById('notifications-dropdown');
                    dropdown.classList.toggle('hidden');
                }

                // Close when clicking outside
                document.addEventListener('click', function(event) {
                    const container = document.getElementById('notifications-container');
                    const dropdown = document.getElementById('notifications-dropdown');
                    if (!container.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            </script>
        </div>

        <span data-slot="badge" class="items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 text-xs hidden sm:flex">
            En línea
        </span>
    </div>
</header>