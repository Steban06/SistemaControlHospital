<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="/disenio/css/styles.css">
    <link rel="stylesheet" href="/disenio/css/tuestilo.css">
    <link rel="stylesheet" href="/disenio/css/theme.css">
</head>

<body >
    <div id="root">
        <div class="flex h-screen bg-gray-50">
            <aside class="-translate-x-full lg:translate-x-0 fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white transition-transform duration-300 flex flex-col">
                <?php include __DIR__ . '/layouts/sidebar.php'; ?>
            </aside>
            <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
                <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 lg:py-4 flex items-center justify-between shadow-sm">
                    <?php $page_title = 'Configuración'; include __DIR__ . '/layouts/header.php'; ?>
                </header>
                <main class="flex-1 overflow-auto bg-gray-50 flex flex-col">
                    <div class="p-4 lg:p-6 space-y-6 flex-1">
                        <div dir="ltr" data-orientation="horizontal" data-slot="tabs" class="flex flex-col gap-2 w-full">
                            <div role="tablist" aria-orientation="horizontal" data-slot="tabs-list" class="bg-muted text-muted-foreground h-9 items-center justify-center rounded-xl p-[3px] grid w-full grid-cols-3" tabindex="0" data-orientation="horizontal" style="outline: none;"><button type="button" role="tab" aria-selected="true" aria-controls="radix-:r2n:-content-users" data-state="active" id="radix-:r2n:-trigger-users" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4" tabindex="-1" data-orientation="horizontal" data-radix-collection-item=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4 mr-2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>Usuarios</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2n:-content-security" data-state="inactive" id="radix-:r2n:-trigger-security" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4" tabindex="-1" data-orientation="horizontal" data-radix-collection-item=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-4 h-4 mr-2">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                    </svg>Seguridad</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2n:-content-notifications" data-state="inactive" id="radix-:r2n:-trigger-notifications" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4" tabindex="-1" data-orientation="horizontal" data-radix-collection-item=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-4 h-4 mr-2">
                                        <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                                        <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                                    </svg>Notificaciones</button></div>
                            <div data-state="active" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2n:-trigger-users" id="radix-:r2n:-content-users" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-6" style="animation-duration: 0s;">
                                <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                                    <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-6 h-6 text-blue-600">
                                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="9" cy="7" r="4"></circle>
                                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                    </svg>Gestión de Usuarios</h4>
                                                <p data-slot="card-description" class="text-muted-foreground">Administre los usuarios y sus permisos en el sistema</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                            <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                                                <p class="text-sm text-blue-700 mb-1">Administradores</p>
                                                <p class="text-2xl font-bold text-blue-900">1</p>
                                            </div>
                                            <div class="p-4 bg-emerald-50 rounded-lg border border-emerald-200">
                                                <p class="text-sm text-emerald-700 mb-1">Usuarios</p>
                                                <p class="text-2xl font-bold text-emerald-900">2</p>
                                            </div>
                                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                                <p class="text-sm text-gray-700 mb-1">Invitados</p>
                                                <p class="text-2xl font-bold text-gray-900">1</p>
                                            </div>
                                        </div>
                                        <div class="border rounded-lg overflow-hidden">
                                            <div data-slot="table-container" class="relative w-full overflow-x-auto">
                                                <table data-slot="table" class="w-full caption-bottom text-sm">
                                                    <thead data-slot="table-header" class="[&amp;_tr]:border-b">
                                                        <tr data-slot="table-row" class="hover:bg-muted/50 data-[state=selected]:bg-muted border-b transition-colors bg-gray-50">
                                                            <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Nombre</th>
                                                            <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Email</th>
                                                            <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Rol</th>
                                                            <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Departamento</th>
                                                            <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Estado</th>
                                                            <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Último Acceso</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-slot="table-body" class="[&amp;_tr:last-child]:border-0">
                                                        <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">María González</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">maria.gonzalez@hospital.com</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-blue-600">Administrador</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Administración</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 text-xs font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                                        <path d="m9 11 3 3L22 4"></path>
                                                                    </svg>Activo</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-sm text-gray-500">2026-01-12 09:30</td>
                                                        </tr>
                                                        <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">Carlos Ramírez</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">carlos.ramirez@hospital.com</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-emerald-600">Usuario</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Urgencias</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 text-xs font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                                        <path d="m9 11 3 3L22 4"></path>
                                                                    </svg>Activo</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-sm text-gray-500">2026-01-12 08:15</td>
                                                        </tr>
                                                        <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">Ana Martínez</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">ana.martinez@hospital.com</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-emerald-600">Usuario</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Cirugía</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 text-xs font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                                        <path d="m9 11 3 3L22 4"></path>
                                                                    </svg>Activo</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-sm text-gray-500">2026-01-11 16:45</td>
                                                        </tr>
                                                        <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">Pedro López</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">pedro.lopez@hospital.com</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-gray-500">Invitado</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Auditoría</td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 text-xs font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-gray-100 text-gray-700 border-gray-300 flex items-center gap-1 w-fit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-3 h-3">
                                                                        <circle cx="12" cy="12" r="10"></circle>
                                                                        <path d="m15 9-6 6"></path>
                                                                        <path d="m9 9 6 6"></path>
                                                                    </svg>Inactivo</span></td>
                                                            <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-sm text-gray-500">2026-01-10 14:20</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                                    <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                        <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-5 h-5 text-blue-600">
                                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                            </svg>Permisos por Rol</h4>
                                        <p data-slot="card-description" class="text-muted-foreground">Descripción de permisos para cada tipo de usuario</p>
                                    </div>
                                    <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                        <div class="space-y-4">
                                            <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                                                <div class="flex items-center gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-blue-600">Administrador</span></div>
                                                <ul class="text-sm text-blue-900 space-y-1 ml-4">
                                                    <li>• Acceso completo a todos los módulos</li>
                                                    <li>• Gestión de usuarios y permisos</li>
                                                    <li>• Crear, editar y eliminar bienes</li>
                                                    <li>• Generar todos los tipos de reportes</li>
                                                </ul>
                                            </div>
                                            <div class="p-4 bg-emerald-50 rounded-lg border border-emerald-200">
                                                <div class="flex items-center gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-emerald-600">Usuario</span></div>
                                                <ul class="text-sm text-emerald-900 space-y-1 ml-4">
                                                    <li>• Ver y consultar inventario</li>
                                                    <li>• Crear y editar bienes</li>
                                                    <li>• Generar reportes básicos</li>
                                                    <li>• Sin acceso a gestión de usuarios</li>
                                                </ul>
                                            </div>
                                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                                <div class="flex items-center gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-gray-500">Invitado</span></div>
                                                <ul class="text-sm text-gray-900 space-y-1 ml-4">
                                                    <li>• Solo lectura del inventario</li>
                                                    <li>• Ver estadísticas del dashboard</li>
                                                    <li>• Sin permisos de edición</li>
                                                    <li>• Sin acceso a reportes avanzados</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2n:-trigger-security" hidden="" id="radix-:r2n:-content-security" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-6"></div>
                            <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2n:-trigger-notifications" hidden="" id="radix-:r2n:-content-notifications" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-6"></div>
                        </div>
                    </div>
                    <?php include __DIR__ . '/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>
    

    <span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>
</body>

</html>