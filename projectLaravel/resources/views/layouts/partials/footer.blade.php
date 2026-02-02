<footer class="bg-[#f4f8f9] dark:bg-gray-900 border-t border-slate-200 dark:border-gray-800 mt-auto py-6 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
            
            <!-- Branding & Version -->
            <div class="text-center md:text-left space-y-1">
                <div class="flex items-center justify-center md:justify-start gap-2">
                    <div class="p-1 bg-blue-600 rounded-lg shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity text-white"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                    </div>
                    <span class="text-sm font-semibold text-slate-900 dark:text-slate-100 tracking-tight">Sistema Hospitalario</span>
                </div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 font-medium">Versión 1.0.0 Stable &bull; Actualizado Ene 2026</p>
            </div>

            <!-- Documentation (Center) -->
            <div class="flex justify-center gap-4">
                <a href="/docs/Manual_Usuario.pdf" class="group flex items-center gap-2 px-3 py-1.5 rounded-md bg-white dark:bg-gray-800 border border-slate-200 dark:border-gray-700 hover:border-blue-300 dark:hover:border-blue-500 hover:shadow-sm transition-all" target="_blank">
                    <div class="p-1 rounded bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    </div>
                    <span class="text-xs font-medium text-slate-600 dark:text-slate-300 group-hover:text-blue-700 dark:group-hover:text-blue-400">Manual Usuario</span>
                </a>
                @if(auth()->user() && auth()->user()->role === 'admin')
                <a href="/docs/Manual_Tecnico.pdf" class="group flex items-center gap-2 px-3 py-1.5 rounded-md bg-white dark:bg-gray-800 border border-slate-200 dark:border-gray-700 hover:border-indigo-300 dark:hover:border-indigo-500 hover:shadow-sm transition-all" target="_blank">
                     <div class="p-1 rounded bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code-2"><path d="m18 16 4-4-4-4"/><path d="m6 8-4 4 4 4"/><path d="m14.5 4-5 16"/></svg>
                    </div>
                    <span class="text-xs font-medium text-slate-600 dark:text-slate-300 group-hover:text-indigo-700 dark:group-hover:text-indigo-400">Manual Técnico</span>
                </a>
                @endif
            </div>

            <!-- Credits & Copyright -->
            <div class="text-center md:text-right text-xs text-slate-500 dark:text-slate-400 space-y-1">
                <p>&copy; 2026 <span class="font-semibold text-slate-700 dark:text-slate-300">Hospital La Divina Misericordia</span>.</p>
                <div class="flex items-center justify-center md:justify-end gap-3 text-[10px] text-slate-400 dark:text-slate-500">
                    <a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Privacidad</a>
                    <span class="text-slate-300 dark:text-slate-600">|</span>
                    <a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Términos</a>
                    <span class="text-slate-300 dark:text-slate-600">|</span>
                    <a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Soporte</a>
                </div>
            </div>
        </div>
    </div>
</footer>