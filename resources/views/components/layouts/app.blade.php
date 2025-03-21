<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }} | {{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/auth/app.css'])
</head>

<body class="bg-zinc-100 dark:bg-zinc-900 w-full h-screen flex items-center justify-center p-5">
    {{ $slot }}
</body>

</html>
