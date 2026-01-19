<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" /> -->

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom-views.css') }}" type="text/css"> -->

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"> -->

    <!-- Styles Inicio -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">

    <!-- Styles Bienes Nacionales -->
    <link rel="stylesheet" href="{{ asset('css/newCSS/tuestilo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/newCSS/theme.css') }}" type="text/css">

    <!-- Scripts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('styles')
</head>
<body>
    <div id="root">
        <div class="flex h-screen bg-gray-50">
            @include('layouts.partials.sidebar2')

            <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
                @include('layouts.partials.header', ['titleHeader' => isset($pageTitle) ? $pageTitle : 'Hospital'])

                <main class="flex-1 overflow-auto bg-gray-50 flex flex-col">
                @yield('content')
                @include('layouts.partials.footer')
                </main>

            </div>
        </div>
    </div>

    @stack('modals')
    @stack('scripts')
</body>
</html>