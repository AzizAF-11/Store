<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'store' }}</title>

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/script.js', 'resources/js/quillEditor.js'])

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    @livewireStyles

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="overflow-x-hidden bg-[#EEEEEE] ">

    @livewire('notification')

    {{ $slot }}

    

    @livewireScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
</body>

</html>