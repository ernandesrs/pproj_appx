<x-shared.panel.page-base :page="$page">

    <x-shared.card class="col-span-12 sm:col-span-6 lg:col-span-12 xl:col-span-6">
        <x-shared.charts.chart
            id="line_chart_1"
            :chart="\App\Support\ChartCreator::line('Gráfico de vendas')
                ->addVerticalInfo(0, 150, 'Vendas por ano')
                ->addHorizontalInfo(['Jan', 'Fev', 'Mar', 'Abr'], 'Vendas por mês')
                ->addSerieData('Venda 2023', [30, 20, 100, 75])
                ->addSerieData('Venda 2024', [60, 10, 50, 105])
                ->addSerieData('Venda 2025', [130, 130, 100, 55])" />
    </x-shared.card>

    <x-shared.card class="col-span-12 sm:col-span-6 lg:col-span-12 xl:col-span-6">
        <x-shared.charts.chart
            id="area_chart_1"
            :chart="\App\Support\ChartCreator::area('Gráfico de vendas')
                ->addVerticalInfo(0, 150, 'Vendas por ano')
                ->addHorizontalInfo(['Jan', 'Fev', 'Mar', 'Abr'], 'Vendas por mês')
                ->addSerieData('Venda 2023', [30, 20, 100, 75])
                ->addSerieData('Venda 2024', [60, 10, 50, 105])
                ->addSerieData('Venda 2025', [130, 130, 100, 55])" />
    </x-shared.card>

    <x-shared.card class="col-span-12 sm:col-span-6 lg:col-span-4">
        <div class="flex flex-col items-start gap-4">
            <x-shared.heading icon="people-fill" tag="h2" title="{{ trans_choice('words.u.user', 2) }}" />
            <span class="text-xl sm:text-2xl md:text-3xl">{{ \App\Models\User::count() }}</span>
        </div>
    </x-shared.card>

    <x-shared.card class="col-span-12 sm:col-span-6 lg:col-span-4">
        <div class="flex flex-col items-start gap-4">
            <x-shared.heading icon="person-fill-gear" tag="h2" title="{{ trans_choice('words.a.admin', 2) }}" />
            <span
                class="text-xl sm:text-2xl md:text-3xl">{{ \App\Models\User::whereHas('roles', fn($query) => $query->whereIn('name', \App\Enums\AdminRolesEnum::cases()))->count() }}</span>
        </div>
    </x-shared.card>

    <x-shared.card class="col-span-12 sm:col-span-6 lg:col-span-4">
        <div class="flex flex-col items-start gap-4">
            <x-shared.heading icon="shield-fill" tag="h2" title="{{ trans_choice('words.r.role', 2) }}" />
            <span class="text-xl sm:text-2xl md:text-3xl">{{ \App\Models\Role::count() }}</span>
        </div>
    </x-shared.card>

</x-shared.panel.page-base>
