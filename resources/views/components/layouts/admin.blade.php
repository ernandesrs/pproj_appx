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
            <x-shared.panel.sidebar.section
                title="Dashboard"
                :menu-items="[
                    [
                        'text' => 'Visão geral',
                        'href' => route('admin.overview'),
                        'activeIn' => ['admin.overivew'],
                    ],
                ]" />

            <x-shared.panel.sidebar.section
                title="Outros"
                :menu-items="[
                    [
                        'text' => 'Menu item #1',
                        'href' => '#',
                        'activeIn' => [],
                    ],
                    [
                        'text' => 'Menu item #2',
                        'href' => '#',
                        'activeIn' => [],
                        'items' => [
                            [
                                'text' => 'Subitem #1',
                                'href' => '#',
                                'activeIn' => [],
                            ],
                            [
                                'text' => 'Subitem #2',
                                'href' => '#',
                                'activeIn' => [],
                            ],
                        ],
                    ],
                ]" />
        </x-slot:sidebar>

        <x-slot:header>
        </x-slot:header>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-shared.panel.layout>
</body>

</html>
