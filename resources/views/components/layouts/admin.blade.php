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
                        'icon' => 'pie-chart',
                        'href' => route('admin.overview'),
                        'activeIn' => ['admin.overview'],
                    ],
                    [
                        'text' => 'Usuários',
                        'icon' => 'people',
                        'href' => route('admin.users.index'),
                        'activeIn' => ['admin.users.index'],
                    ],
                ]" />

            <x-shared.panel.sidebar.section
                title="Outros"
                :menu-items="[
                    [
                        'text' => 'Meu perfil',
                        'icon' => 'person-circle',
                        'href' => route('admin.profile'),
                        'activeIn' => ['admin.profile'],
                    ],
                    [
                        'text' => 'Menu item #2',
                        'icon' => 'arrow-up',
                        'href' => '#',
                        'activeIn' => [],
                        'items' => [
                            [
                                'text' => 'Subitem #1',
                                'icon' => 'arrow-right',
                                'href' => '#',
                                'activeIn' => [],
                            ],
                            [
                                'text' => 'Subitem #2',
                                'icon' => 'arrow-right',
                                'href' => '#',
                                'activeIn' => [],
                            ],
                        ],
                    ],
                    [
                        'text' => 'Menu item #3',
                        'icon' => 'arrow-up',
                        'href' => '#',
                        'activeIn' => [],
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
