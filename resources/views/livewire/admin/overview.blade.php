<x-shared.panel.page-base :page="$page">
    <livewire:admin.overview-charts />

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
