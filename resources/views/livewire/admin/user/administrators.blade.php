@push('livewire_dialogs')
    <x-shared.dialog
        id="dialog_new_admin"
        title="{{ $userToPromote ? 'Cargos de ' . $userToPromote->first_name . ' ' . $userToPromote->last_name : 'Novo administrador' }}"
        size="lg">
        @if ($userToPromote)
            <x-shared.heading class="mb-3" tag="h4"
                title="Clique sobre o cargo para remove-lo ou atribui-lo ao usuário atual." />
            <div class="col-span-12 flex flex-wrap justify-start items-center gap-x-2 gap-y-3">
                @foreach (\App\Models\Role::all() as $role)
                    @if ($userToPromote->hasRole($role))
                        <x-shared.clickable
                            wire:click='removeRole({{ $role->id }})'
                            prepend-icon="check-lg"
                            :text="$role->name->label()"
                            style="success" small />
                    @else
                        <x-shared.clickable
                            wire:click='assingRole({{ $role->id }})'
                            prepend-icon="x-lg"
                            :text="$role->name->label()"
                            style="light"
                            variant="outlined" small />
                    @endif
                @endforeach
            </div>
        @else
            <div class="col-span-12 grid grid-cols-12 gap-5">
                <x-shared.form.form
                    class="col-span-12"
                    action="#"
                    method="get"
                    submit-text="Buscar usuário"
                    wire:submit='searchByUser'>
                    <x-shared.form.field
                        class="col-span-12"
                        label="Buscar usuário"
                        type="text"
                        name="searchUser"
                        wire:model='searchUser' />
                </x-shared.form.form>

                @if ($searchResults)
                    <x-shared.table.table class="col-span-12">
                        @foreach ($searchResults as $sr)
                            <x-shared.table.row>
                                <x-shared.table.cell :value="$sr->first_name . ' ' . $sr->last_name" />
                                <x-shared.table.cell :value="$sr->email" />
                                <x-shared.table.cell>
                                    @can('update', $sr)
                                        <x-shared.clickable
                                            wire:click='chooseUserToPromote({{ $sr->id }})'
                                            prepend-icon="check-lg"
                                            text="Escolher" small />
                                    @endcan
                                </x-shared.table.cell>
                            </x-shared.table.row>
                        @endforeach
                    </x-shared.table.table>
                @endif
            </div>
        @endif
    </x-shared.dialog>
@endpush

<x-shared.panel.page-list
    :page="$page"
    :items="$items"
    :list-columns="self::getColumns()"
    :filterBetweenDates="self::getFilterFieldsBetweenDates()"
    :filterSortableFields="self::getFilterFieldsSortables()">

    <x-slot:filters>
        {{-- More filter filds --}}
    </x-slot:filters>

    {{-- Page actions --}}
    <x-slot:actions>
        {{-- Dialog: promote user --}}
        <x-shared.clickable
            wire:loading.class='loading'
            wire:target='openUserPromotionDialog'
            wire:click='openUserPromotionDialog'
            prepend-icon="person-plus"
            text="{{ trans_choice('words.n.new', 1) }} {{ \Str::lower(trans_choice('words.a.admin', 1)) }}" />
        {{-- /Dialog: promote user --}}
    </x-slot:actions>

</x-shared.panel.page-list>
