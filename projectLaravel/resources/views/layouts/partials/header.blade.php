<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <nav class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" 
                       class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                @else
                    <a href="#" 
                       class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Iniciar Sesión
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Registrarse
                        </a>
                    @endif
                @endauth
            </nav>
        </div>
    </div>
</header>

