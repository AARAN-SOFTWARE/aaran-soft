<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="">
<div class="w-full">
    @switch(config('aadmin.app_type'))
        @case(config('software.SPORTS_CLUB'))
            <x-menu.web-top-sports/>
            @break
        @default
            <x-menu.web-top-new/>
    @endswitch
    {{ $slot }}
        @switch(config('aadmin.app_type'))
            @case(config('software.SPORTS_CLUB'))
                <x-sports.footer.sponser/>
                <x-sports.footer.footer/>
                @break
            @default
{{--                <x-SportsClub.footer.copyright/>--}}
        @endswitch
</div>

@livewireScripts
@stack('custom-scripts')
</body>
</html>
