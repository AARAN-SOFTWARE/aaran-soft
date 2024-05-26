<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/@alpinejs/ui@3.13.10-beta.0/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/focus@3.13.10/dist/cdn.min.js"></script>
    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">


<div x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen=false"
     class="min-h-screen bg-white print:bg-white">
    <div class="flex-1">

        <x-menu.top-menu>{{$header}}</x-menu.top-menu>
        <x-menu.side-menu/>

        <!-- Page Content -->
        <main class="p-3 bg-white print:bg-white">
            {{ $slot }}
        </main>


    </div>
</div>
<x-notify/>

@stack('modals')

@livewireScripts

<script>
    function copyToClipboard(id) {
        navigator.clipboard.writeText(id);
    }
</script>

@stack('custom-scripts')

</body>
</html>
