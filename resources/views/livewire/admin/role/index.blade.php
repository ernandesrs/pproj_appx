@push('livewire_dialogs')
    <x-shared.dialog
        id="dialog_role_update"
        title="{{ trans_choice('words.u.update', 1) }} {{ \Str::lower(trans_choice('words.r.role', 1)) }}">
        <div class="grid grid-cols-12 gap-5">
            @if ($roleUpdate->role?->isDefaultAdminRole())
                <x-shared.form.field
                    class="col-span-12"
                    wire:model.live='roleUpdate.name'
                    label="Nome do cargo"
                    type="text"
                    name="name" disabled />
            @else
                <x-shared.form.form
                    wire:submit='updateRole'
                    class="col-span-12"
                    action="#"
                    method="get"
                    submit-text="{{ trans_choice('words.u.update', 1) }} {{ \Str::lower(trans_choice('words.r.role', 1)) }}">
                    @include('livewire.admin.role.includes.role-form-fields', [
                        'creating' => false,
                        'formName' => 'roleUpdate',
                    ])
                </x-shared.form.form>
            @endif

            @if ($roleUpdate->role?->name == \App\Enums\AdminRolesEnum::SUPER)
                <x-shared.card class="col-span-12">
                    <div class="flex justify-center">
                        <x-shared.heading tag="h4" icon="shield-fill"
                            title="Cargo possui todas as permissões!" />
                    </div>
                </x-shared.card>
            @else
                @foreach (\App\Models\Permission::permissionsEnumsClass() as $permissionEnumClass)
                    <x-shared.card class="col-span-12" title-tag="h4" :title="$permissionEnumClass::label()">
                        <div class="flex flex-wrap justify-start gap-2">
                            @foreach ($permissionEnumClass::cases() as $permissionEnum)
                                @if ($roleUpdate->role?->hasPermissionTo($permissionEnum))
                                    <x-shared.clickable
                                        wire:click="revokePermission('{{ $permissionEnum }}')"
                                        prepend-icon="check-lg"
                                        :text="$permissionEnum->permissionLabel()"
                                        style="success" small />
                                @else
                                    <x-shared.clickable
                                        wire:click="givePermission('{{ $permissionEnum }}')"
                                        prepend-icon="x-lg"
                                        :text="$permissionEnum->permissionLabel()"
                                        style="light" variant="flat" small />
                                @endif
                            @endforeach
                        </div>
                    </x-shared.card>
                @endforeach
            @endif
        </div>
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

    <x-slot:actions>
        {{-- Page actions --}}
    </x-slot:actions>

    <x-slot:prepend-list>
    </x-slot:prepend-list>
</x-shared.panel.page-list>
