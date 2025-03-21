<x-shared.panel.page-list
    :page="$page"
    :items="$items"
    :list-columns="self::getColumns()"
    :filterBetweenDates="self::getFilterFieldsBetweenDates()"
    :filterSortableFields="self::getFilterFieldsSortables()">

    <x-slot:filters>
        {{-- More filter filds --}}
    </x-slot:filters>

    <x-slot:actions>
        {{-- Page actions --}}
    </x-slot:actions>

    <x-slot:prepend-list>
        <x-shared.dialog
            id="dialog_role_update"
            title="{{ trans_choice('words.u.update', 1) }} {{ \Str::lower(trans_choice('words.r.role', 1)) }}">
        </x-shared.dialog>
    </x-slot:prepend-list>

</x-shared.panel.page-list>
