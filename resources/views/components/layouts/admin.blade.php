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
                        'text' => trans_choice('words.o.overview', 1),
                        'icon' => 'pie-chart',
                        'href' => route('admin.overview'),
                        'activeIn' => ['admin.overview'],
                    ],
                    [
                        'text' => trans_choice('words.u.user', 2),
                        'icon' => 'people',
                        'href' => route('admin.users.index'),
                        'activeIn' => ['admin.users.index'],
                    ],
                    [
                        'text' => trans_choice('words.r.role', 2),
                        'icon' => 'shield',
                        'href' => route('admin.roles.index'),
                        'activeIn' => ['admin.roles.index'],
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
                        'text' => trans_choice('words.m.my', 1) . ' ' . trans_choice('words.p.profile', 1),
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
                        title="{{ trans_choice('words.n.notification', 2) }}"
                        title-tag="h4">
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
                        title="{{ trans_choice('words.m.my', 1) . ' ' . trans_choice('words.p.profile', 1) }}"
                        title-tag="h4">
                        A
                        <hr class="border border-zinc-200 dark:border-zinc-800 my-3">
                        <div class="flex gap-2 justify-center items-center">
                            <x-shared.clickable
                                style="danger"
                                prepend-icon="box-arrow-left"
                                text="Logout"
                                :href="route('auth.logout')"
                                as-link
                                small />
                        </div>
                    </x-shared.card>
                </x-shared.dropdown>
            </x-slot:append>
        </x-slot:header>

        <x-slot:content>
            <x-shared.feedback id="admin_global" />

            {{ $slot }}
        </x-slot:content>
    </x-shared.panel.layout>
</body>

</html>
