<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sistem Peminjaman ITENAS') }}</title>

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- ✅ CSS STATIC (WAJIB UNTUK RAILWAY / PRODUCTION) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- ✅ JS TETAP VIA VITE -->
    @vite(['resources/js/app.js'])

    <!-- External Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- LOGIN & REGISTER TANPA NAVBAR --}}
    @if (in_array(Route::currentRouteName(), ['login', 'register']))
        {{ $slot }}
    @else
        {{-- NAVBAR --}}
        <x-navbar />

        {{-- CONTENT --}}
        <main class="pt-20">
            {{ $slot }}
        </main>
    @endif

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 700,
        });
    </script>
</body>
</html>