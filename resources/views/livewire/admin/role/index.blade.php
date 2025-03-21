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
            <div class="grid grid-cols-12 gap-5">
                <x-shared.form.field
                    class="col-span-12"
                    wire:model.live='roleUpdate.name'
                    label="Nome do cargo"
                    type="text"
                    name="name" :disabled="$roleUpdate->role?->isDefaultAdminRole()" />

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
    </x-slot:prepend-list>

</x-shared.panel.page-list>
