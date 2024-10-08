<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- get css public/build/assets/app.css --}}
        {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-Dp6PuIMS.css') }}">
        <script src="{{ asset('build/assets/app-CH09qwMe.js') }}"></script> --}}

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.nav')

            <main>
                @yield('content')
            </main>
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
