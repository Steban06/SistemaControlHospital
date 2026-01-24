<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - Hospital Virgen del Valle</title>
    
    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/newCSS/tuestilo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/newCSS/theme.css') }}" type="text/css">
    
    <!-- Tailwind CDN (Backup if local build fails) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Check for dark mode preference immediately
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        border: "hsl(var(--border))",
                        input: "hsl(var(--input))",
                        ring: "hsl(var(--ring))",
                        background: "hsl(var(--background))",
                        foreground: "hsl(var(--foreground))",
                        primary: {
                            DEFAULT: "hsl(var(--primary))",
                            foreground: "hsl(var(--primary-foreground))",
                        },
                        secondary: {
                            DEFAULT: "hsl(var(--secondary))",
                            foreground: "hsl(var(--secondary-foreground))",
                        },
                        destructive: {
                            DEFAULT: "hsl(var(--destructive))",
                            foreground: "hsl(var(--destructive-foreground))",
                        },
                        muted: {
                            DEFAULT: "hsl(var(--muted))",
                            foreground: "hsl(var(--muted-foreground))",
                        },
                        accent: {
                            DEFAULT: "hsl(var(--accent))",
                            foreground: "hsl(var(--accent-foreground))",
                        },
                        popover: {
                            DEFAULT: "hsl(var(--popover))",
                            foreground: "hsl(var(--popover-foreground))",
                        },
                        card: {
                            DEFAULT: "hsl(var(--card))",
                            foreground: "hsl(var(--card-foreground))",
                        },
                    },
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-100 dark:bg-gray-950 transition-colors duration-300">
    <div id="root">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div data-slot="card" class="bg-white dark:bg-gray-800 text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 dark:border-gray-700 w-full max-w-md shadow-2xl">
                <div data-slot="card-header" class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-8 space-y-4 text-center pb-6">
                    <div class="flex justify-center">
                        <div class="bg-blue-600 p-4 rounded-2xl shadow-lg ring-4 ring-blue-50 dark:ring-blue-900/30">
                            <!-- Logo Reemplazado -->
                            <img src="{{ asset('images/svg/virgen-compact.svg') }}" alt="Logo Hospital Virgen del Valle" class="w-16 h-16 object-contain drop-shadow-md brightness-0 invert"> 
                        </div>
                    </div>
                    <div>
                        <h4 data-slot="card-title" class="text-sm font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-widest mb-1">Sistema de Gestión</h4>
                        <h5 data-slot="card-title" class="text-3xl font-bold text-gray-900 dark:text-gray-100 tracking-tight">Bienes Nacionales</h5>
                        <p data-slot="card-description" class="text-slate-500 dark:text-slate-400 text-sm font-medium mt-2">Hospital Virgen del Valle</p>
                    </div>
                </div>
                <div data-slot="card-content" class="px-8 pb-8">
                    <form class="space-y-5" method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="space-y-2">
                            <label data-slot="label" class="flex items-center gap-2 text-sm font-semibold text-gray-700 dark:text-gray-300 ml-1" for="username">Usuario</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <input type="text" name="username" class="flex h-11 w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-1 text-sm shadow-sm transition-all file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-gray-400 focus-visible:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 disabled:cursor-not-allowed disabled:opacity-50 pl-10 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-blue-900" id="username" placeholder="Ingrese su usuario" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label data-slot="label" class="flex items-center gap-2 text-sm font-semibold text-gray-700 dark:text-gray-300 ml-1" for="password">Contraseña</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                                <input type="password" name="password" class="flex h-11 w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-1 text-sm shadow-sm transition-all file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-gray-400 focus-visible:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 disabled:cursor-not-allowed disabled:opacity-50 pl-10 pr-10 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-blue-900" id="password" placeholder="Ingrese su contraseña" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" onclick="togglePassword()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors focus:outline-none p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800">
                                        <svg id="icon-eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        <svg id="icon-eye-off" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off hidden">
                                            <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                            <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                                            <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7c.44 0 .87-.03 1.28-.09"></path>
                                            <line x1="2" x2="22" y1="2" y2="22"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <script>
                            function togglePassword() {
                                const passwordInput = document.getElementById('password');
                                const iconEye = document.getElementById('icon-eye');
                                const iconEyeOff = document.getElementById('icon-eye-off');

                                if (passwordInput.type === 'password') {
                                    passwordInput.type = 'text';
                                    iconEye.classList.add('hidden');
                                    iconEyeOff.classList.remove('hidden');
                                } else {
                                    passwordInput.type = 'password';
                                    iconEye.classList.remove('hidden');
                                    iconEyeOff.classList.add('hidden');
                                }
                            }
                        </script>
                        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-bold transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400 disabled:pointer-events-none disabled:opacity-50 text-white h-11 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 hover:shadow-lg active:scale-[0.98] mt-4" type="submit">
                            Iniciar Sesión
                        </button>
                        <p class="text-xs text-center text-gray-400 dark:text-gray-500 mt-6">
                            &copy; {{ date('Y') }} Hospital Virgen del Valle
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
