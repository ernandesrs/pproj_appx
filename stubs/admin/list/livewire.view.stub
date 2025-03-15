<x-shared.panel.page-base :page="$page">

    <x-shared.dialog
        id="dialog_list_filter"
        icon="funnel-fill"
        title="{{ trans_choice('words.f.filter', 2) }}"
        size="lg">
        <x-shared.form.form
            wire:submit='applyFilters'
            method="post"
            action="#"
            submit-text="Aplicar filtros">

            @foreach ($betweenDefaultFields as $key => $bd)
                <x-shared.card class="col-span-12" icon="calendar" title="Entre {{ $bd }}" title-tag="h3">
                    <div class="grid grid-cols-12 gap-1">
                        <x-shared.form.field
                            class="col-span-6"
                            label="{{ trans_choice('words.f.from', 1) }}"
                            wire:model='between.{{ $bd }}.start'
                            name="between_{{ $bd }}_start"
                            type="date" />

                        <x-shared.form.field
                            class="col-span-6"
                            label="{{ trans_choice('words.t.to', 2) }}"
                            wire:model='between.{{ $bd }}.end'
                            name="between_{{ $bd }}_end"
                            type="date" />
                    </div>
                </x-shared.card>
            @endforeach

            <x-shared.card class="col-span-12" icon="calendar" title="Ordenar" title-tag="h3">
                <div class="grid grid-cols-12 gap-1">
                    <x-shared.form.field
                        class="col-span-8"
                        wire:model='sort_by'
                        label="{{ trans_choice('words.s.sort_by', 1) }}"
                        name="sort_by"
                        type="select"
                        :options="array_map(
                            fn($i) => [
                                'label' => trans_choice('words.' . \Str::charAt(\Str::lower($i), 0) . '.' . $i, 1),
                                'value' => $i,
                            ],
                            $sortableDefaultFields,
                        )" />
                    <x-shared.form.field
                        class="col-span-4"
                        wire:model='sort_direction'
                        label="{{ trans_choice('words.d.direction', 1) }}"
                        name="sort_direction"
                        type="select"
                        :options="[
                            [
                                'label' => 'Crescente',
                                'value' => 'asc',
                            ],
                            [
                                'label' => 'Decrescente',
                                'value' => 'desc',
                            ],
                        ]" />
                </div>
            </x-shared.card>

        </x-shared.form.form>
    </x-shared.dialog>

    <div class="col-span-12 flex gap-x-3 justify-end">
        {{-- search --}}
        @if (count(self::searchableFields()))
            <div class="flex items-center gap-x-1">
                <x-shared.form.field wire:model='search' name="search" placeholder="Pesquisar" />
                <x-shared.clickable
                    class="hover:!scale-100"
                    wire:click='searchBy'
                    icon="search"
                    style="light"
                    variant="filled" />
            </div>
        @endif

        <x-shared.dialog-activator
            controls="dialog_list_filter"
            icon="funnel-fill" />
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
