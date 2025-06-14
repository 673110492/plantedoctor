<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen font-sans antialiased text-black bg-white">

    {{-- Navigation --}}
    <nav class="text-black bg-white shadow-md">
        @include('layouts.navigation')
    </nav>

    {{-- Header --}}
    @if (isset($header))
        <header class="text-black bg-white border-b border-gray-300">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight">
                    {{ $header }}
                </h1>
            </div>
        </header>
    @endif

    {{-- Main content --}}
    <main class="flex-grow px-4 py-8 mx-auto text-black max-w-7xl sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="py-4 text-sm text-center text-gray-600 bg-white border-t border-gray-300">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Tous droits réservés.
    </footer>

</body>
</html>
