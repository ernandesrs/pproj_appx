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
                title="Mais itens"
                :menu-items="[
                    [
                        'text' => 'Menu item #1',
                        'icon' => 'arrow-up',
                        'href' => '#',
                        'activeIn' => [],
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

            <x-shared.panel.sidebar.section
                title="Outros"
                :menu-items="[
                    [
                        'text' => 'Meu perfil',
                        'icon' => 'person-circle',
                        'href' => route('admin.profile'),
                        'activeIn' => ['admin.profile'],
                    ],
                ]" />
        </x-slot:sidebar>

        <x-slot:header>
            <x-slot:append>
                <x-shared.dropdown
                    class="w-[200px] sm:w-[225px]"
                    location="right">
                    <x-slot:activator>
                        <x-shared.clickable
                            class="hover:!scale-100"
                            style="light"
                            variant="flat"
                            icon="bell" />
                    </x-slot:activator>
                    <x-shared.card
                        icon="bell"
                        title="Notificações">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat dolor suscipit mollitia saepe
                        nesciunt repudiandae autem assumenda nihil quia, inventore corporis fugiat placeat voluptatem
                        perferendis, cum rerum aut aperiam harum!
                    </x-shared.card>
                </x-shared.dropdown>

                <x-shared.dropdown
                    class="w-[200px] sm:w-[225px]"
                    location="right">
                    <x-slot:activator>
                        <x-shared.clickable
                            class="hover:!scale-100"
                            style="light"
                            variant="flat"
                            icon="person-circle" />
                    </x-slot:activator>
                    <x-shared.card
                        icon="person-circle"
                        title="Meu perfil">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat dolor suscipit mollitia saepe
                        nesciunt repudiandae autem assumenda nihil quia, inventore corporis fugiat placeat voluptatem
                        perferendis, cum rerum aut aperiam harum!
                    </x-shared.card>
                </x-shared.dropdown>
            </x-slot:append>
        </x-slot:header>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-shared.panel.layout>
</body>

</html>
