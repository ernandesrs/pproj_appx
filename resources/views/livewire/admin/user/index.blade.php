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

</x-shared.panel.page-list>
