<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/admin/app.css'])
</head>

<body>
    <x-shared.panel.layout>
        <x-slot:sidebar>
        </x-slot:sidebar>

        <x-slot:header>
        </x-slot:header>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-shared.panel.layout>
</body>

</html>
