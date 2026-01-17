<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/disenio/css/login-fix.css">
    <link rel="stylesheet" href="/disenio/css/styles.css">
    <!-- <link rel="stylesheet" href="/disenio/css/index.css"> -->
</head>

<body>
    <div id="root">
        <div class="flex h-screen bg-gray-50">
            
                <!-- sidebar sidebar  -->
            <aside class="-translate-x-full lg:translate-x-0 fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white transition-transform duration-300 flex flex-col">
                <?php include __DIR__ . '/layouts/sidebar.php'; ?>
            </aside>

            <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
                <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 lg:py-4 flex items-center justify-between shadow-sm">
                        <?php $page_title = 'Dashboard'; include __DIR__. '/layouts/header.php'; ?>
                </header>

                <!-- main content  -->
                <main class="flex-1 overflow-auto p-4 lg:p-6 bg-gray-50">
                    <div class="space-y-4 lg:space-y-6">

                        <!-- Aqui van las card carijitaaa -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-6">
                                <!-- Card 1 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl relative overflow-hidden border-0 shadow-lg hover:shadow-xl transition-shadow">
                                <div class="absolute top-0 right-0 w-24 h-24 lg:w-32 lg:h-32 bg-emerald-50 rounded-full -mr-12 lg:-mr-16 -mt-12 lg:-mt-16 opacity-50"></div>
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 pb-2">
                                    <div class="flex items-center justify-between">
                                        <p data-slot="card-description" class="text-gray-600 font-medium text-xs lg:text-sm">Bienes Operativos</p>
                                        <div class="bg-emerald-500 p-2 lg:p-3 rounded-lg shadow-md"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4 lg:w-5 lg:h-5 text-white">
                                                <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                                <path d="M12 22V12"></path>
                                                <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                                <path d="m7.5 4.27 9 5.15"></path>
                                            </svg></div>
                                    </div>
                                </div>
                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <div class="space-y-1">
                                        <p class="text-2xl lg:text-3xl font-bold text-gray-900">1,248</p>
                                        <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-3 h-3 lg:w-4 lg:h-4 text-emerald-600">
                                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                                <polyline points="16 7 22 7 22 13"></polyline>
                                            </svg><span class="text-xs lg:text-sm font-medium text-emerald-600">+12%</span><span class="text-xs lg:text-sm text-gray-500 hidden sm:inline">vs mes anterior</span></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Card 2 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl relative overflow-hidden border-0 shadow-lg hover:shadow-xl transition-shadow">
                                <div class="absolute top-0 right-0 w-24 h-24 lg:w-32 lg:h-32 bg-amber-50 rounded-full -mr-12 lg:-mr-16 -mt-12 lg:-mt-16 opacity-50"></div>
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 pb-2">
                                    <div class="flex items-center justify-between">
                                        <p data-slot="card-description" class="text-gray-600 font-medium text-xs lg:text-sm">En Mantenimiento</p>
                                        <div class="bg-amber-500 p-2 lg:p-3 rounded-lg shadow-md"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-4 h-4 lg:w-5 lg:h-5 text-white">
                                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                            </svg></div>
                                    </div>
                                </div>
                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <div class="space-y-1">
                                        <p class="text-2xl lg:text-3xl font-bold text-gray-900">87</p>
                                        <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-down w-3 h-3 lg:w-4 lg:h-4 text-red-600">
                                                <polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline>
                                                <polyline points="16 17 22 17 22 11"></polyline>
                                            </svg><span class="text-xs lg:text-sm font-medium text-red-600">-5%</span><span class="text-xs lg:text-sm text-gray-500 hidden sm:inline">vs mes anterior</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl relative overflow-hidden border-0 shadow-lg hover:shadow-xl transition-shadow">
                                <div class="absolute top-0 right-0 w-24 h-24 lg:w-32 lg:h-32 bg-red-50 rounded-full -mr-12 lg:-mr-16 -mt-12 lg:-mt-16 opacity-50"></div>
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 pb-2">
                                    <div class="flex items-center justify-between">
                                        <p data-slot="card-description" class="text-gray-600 font-medium text-xs lg:text-sm">Fuera de Servicio</p>
                                        <div class="bg-red-500 p-2 lg:p-3 rounded-lg shadow-md"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert w-4 h-4 lg:w-5 lg:h-5 text-white">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" x2="12" y1="8" y2="12"></line>
                                                <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                            </svg></div>
                                    </div>
                                </div>
                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <div class="space-y-1">
                                        <p class="text-2xl lg:text-3xl font-bold text-gray-900">34</p>
                                        <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-3 h-3 lg:w-4 lg:h-4 text-emerald-600">
                                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                                <polyline points="16 7 22 7 22 13"></polyline>
                                            </svg><span class="text-xs lg:text-sm font-medium text-emerald-600">+3%</span><span class="text-xs lg:text-sm text-gray-500 hidden sm:inline">vs mes anterior</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl relative overflow-hidden border-0 shadow-lg hover:shadow-xl transition-shadow">
                                <div class="absolute top-0 right-0 w-24 h-24 lg:w-32 lg:h-32 bg-gray-50 rounded-full -mr-12 lg:-mr-16 -mt-12 lg:-mt-16 opacity-50"></div>
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 pb-2">
                                    <div class="flex items-center justify-between">
                                        <p data-slot="card-description" class="text-gray-600 font-medium text-xs lg:text-sm">Desincorporados</p>
                                        <div class="bg-gray-500 p-2 lg:p-3 rounded-lg shadow-md"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive w-4 h-4 lg:w-5 lg:h-5 text-white">
                                                <rect width="20" height="5" x="2" y="3" rx="1"></rect>
                                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"></path>
                                                <path d="M10 12h4"></path>
                                            </svg></div>
                                    </div>
                                </div>
                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <div class="space-y-1">
                                        <p class="text-2xl lg:text-3xl font-bold text-gray-900">156</p>
                                        <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-3 h-3 lg:w-4 lg:h-4 text-emerald-600">
                                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                                <polyline points="16 7 22 7 22 13"></polyline>
                                            </svg><span class="text-xs lg:text-sm font-medium text-emerald-600">+18%</span><span class="text-xs lg:text-sm text-gray-500 hidden sm:inline">vs mes anterior</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contenedor de dos graficas -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                            
                            <!-- Grafica 1 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                    <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity w-4 h-4 lg:w-5 lg:h-5 text-blue-600">
                                            <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                                        </svg>Tendencias Mensuales</h4>
                                    <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm">Actividad de bienes en los últimos 6 meses</p>
                                </div>

                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <div class="recharts-responsive-container lg:h-[300px]" style="width: 100%; height: 250px; min-width: 0px;">
                                        <div class="recharts-wrapper" style="position: relative; cursor: default; width: 100%; height: 100%; max-height: 250px; max-width: 309px;">
                                            Grafica de Lineas                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Grafica 2 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                    <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4 lg:w-5 lg:h-5 text-blue-600">
                                            <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                            <path d="M12 22V12"></path>
                                            <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                            <path d="m7.5 4.27 9 5.15"></path>
                                        </svg>Distribución por Categoría</h4>
                                    <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm">Total de bienes por tipo</p>
                                </div>

                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <div class="recharts-responsive-container lg:h-[300px]" style="width: 100%; height: 250px; min-width: 0px;">
                                        <div class="recharts-wrapper" style="position: relative; cursor: default; width: 100%; height: 100%; max-height: 250px; max-width: 309px;">
                                            Grafica de Barras
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Grafica Ancha  -->
                        <!-- <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4 lg:w-5 lg:h-5 text-blue-600">
                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                        <polyline points="16 7 22 7 22 13"></polyline>
                                    </svg>Bienes por Departamento</h4>
                                <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm">Distribución de bienes en los principales departamentos</p>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                <div class="recharts-responsive-container lg:h-[300px]" style="width: 100%; height: 250px; min-width: 0px;">
                                    <div class="recharts-wrapper" style="position: relative; cursor: default; width: 100%; height: 100%; max-height: 250px; max-width: 690px;">
                                         grafica de barras horizontales   
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Tres tarjetas resumen  -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6">
                                <!-- card 1 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-lg border-l-4 border-l-blue-500 border-t-0 border-r-0 border-b-0">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 pb-3">
                                    <h4 data-slot="card-title" class="text-blue-600 text-base lg:text-lg">Total de Bienes</h4>
                                </div>
                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <p class="text-3xl lg:text-4xl font-bold text-gray-900">1,525</p>
                                    <p class="text-xs lg:text-sm text-gray-500 mt-2">Registrados en el sistema</p>
                                </div>
                            </div>

                            <!-- card 2 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-lg border-l-4 border-l-emerald-500 border-t-0 border-r-0 border-b-0">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 pb-3">
                                    <h4 data-slot="card-title" class="text-emerald-600 text-base lg:text-lg">Valor Total</h4>
                                </div>
                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <p class="text-3xl lg:text-4xl font-bold text-gray-900">$2.4M</p>
                                    <p class="text-xs lg:text-sm text-gray-500 mt-2">En bienes operativos</p>
                                </div>
                            </div>

                            <!-- card 3 -->
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-lg border-l-4 border-l-amber-500 border-t-0 border-r-0 border-b-0">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 pb-3">
                                    <h4 data-slot="card-title" class="text-amber-600 text-base lg:text-lg">Mantenimientos Pendientes</h4>
                                </div>
                                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                    <p class="text-3xl lg:text-4xl font-bold text-gray-900">23</p>
                                    <p class="text-xs lg:text-sm text-gray-500 mt-2">Requieren atención</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>
    <!-- <script type="module" src="/src/main.tsx"></script> -->


    <span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>
</body>

</html>