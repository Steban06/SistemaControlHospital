<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom-views.css') }}" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    @stack('styles')
</head>
<body class="font-sans antialiased">
    @include('layouts.partials.sidebar')
    
    <section class="home-section">
        <div class="home-content">
            <i class="fa-solid fa-bars bx-menu"></i>
            <!-- <span class="text">Sistema de Control</span> -->
            <span class="text">@yield('title_superior', 'Bienvenido')</span>
        </div>
        
        <div class="content-view">
            @yield('content')
        </div>
    </section>

    @stack('scripts')
</body>
</html>

