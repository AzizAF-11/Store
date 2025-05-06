<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'store' }}</title>
        @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/script.js'])
        
        @livewireStyles
        
    </head>
    <body class="overflow-x-hidden">
        @livewire('notification')
        {{ $slot }}
        @livewireScripts
    </body>
</html>
