<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/public/css/login-fix.css">
    <link rel="stylesheet" href="/public/css/tailwind.css">
    <link rel="stylesheet" href="/public/css/index.css">
</head>

<body>
    <div id="root">
        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-emerald-50">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border w-full max-w-md mx-4 shadow-xl border-blue-100">
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 space-y-4 text-center pb-8">
                    <div class="flex justify-center">
                        <div class="bg-blue-600 p-4 rounded-2xl shadow-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hospital w-12 h-12 text-white">
                                <path d="M12 6v4"></path>
                                <path d="M14 14h-4"></path>
                                <path d="M14 18h-4"></path>
                                <path d="M14 8h-4"></path>
                                <path d="M18 12h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-9a2 2 0 0 1 2-2h2"></path>
                                <path d="M18 22V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v18"></path>
                            </svg></div>
                    </div>
                    <div>
                        <h4 data-slot="card-title" class="text-2xl">Sistema de Gestión de Bienes</h4>
                        <p data-slot="card-description" class="text-muted-foreground text-base mt-2">Hospital Virgen del Valle</p>
                    </div>
                </div>
                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                    <form class="space-y-4">
                        <div class="space-y-2"><label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="username">Usuario</label>
                            <div class="relative"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg><input type="text" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10" id="username" placeholder="Ingrese su usuario" required="" value=""></div>
                        </div>
                        <div class="space-y-2"><label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="password">Contraseña</label>
                            <div class="relative"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg><input type="password" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10" id="password" placeholder="Ingrese su contraseña" required="" value=""></div>
                        </div><button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-9 px-4 py-2 has-[&gt;svg]:px-3 w-full bg-blue-600 hover:bg-blue-700 mt-6" type="submit">Iniciar Sesión</button>
                        <p class="text-xs text-center text-gray-500 mt-4">Demo: Use cualquier usuario/contraseña (use "admin" en el usuario para rol de administrador)</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>