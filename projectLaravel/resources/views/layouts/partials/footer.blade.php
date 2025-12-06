<footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-sm text-gray-600 dark:text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.
            </div>
            <div class="mt-4 md:mt-0">
                <nav class="flex space-x-4">
                    <a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                        Términos
                    </a>
                    <a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                        Privacidad
                    </a>
                    <a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                        Contacto
                    </a>
                </nav>
            </div>
        </div>
    </div>
</footer>

