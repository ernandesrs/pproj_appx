<x-shared.panel.page-base :page="$page">

    <div class="col-span-12 flex justify-end">
        <div class="flex items-center gap-x-1">
            <x-shared.form.field wire:model='search' name="search" placeholder="Pesquisar" />
            <x-shared.clickable class="hover:!scale-100" wire:click='searchBy' icon="search" variant="filled" />
        </div>
    </div>

    <x-shared.table.table class="col-span-12">
        <x-slot:theader>
            <x-shared.table.row header-row>
                @foreach (self::columns() as $column)
                    <x-shared.table.cell header-cell :value="$column['label']" />
                @endforeach
            </x-shared.table.row>
        </x-slot:theader>
        <x-slot:tbody>
            @foreach ($items as $item)
                <x-shared.table.row>
                    @foreach (self::columns() as $column)
                        @php
                            $modelAttr = $column['key'] ?? null;
                            $view = $column['view'] ?? null;
                        @endphp
                        @if ($modelAttr)
                            <x-shared.table.cell :value="$item->$modelAttr" />
                        @elseif ($view)
                            <x-shared.table.cell>
                                @include($view, ['item' => $item])
                            </x-shared.table.cell>
                        @endif
                    @endforeach
                </x-shared.table.row>
            @endforeach
        </x-slot:tbody>
    </x-shared.table.table>

    <div class="col-span-12 flex justify-center">
        {{ $items->links() }}
    </div>

</x-shared.panel.page-base>
