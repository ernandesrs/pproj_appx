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
        <x-shared.clickable
            wire:loading.class='pointer-events-none animate-pulse'
            wire:click="openUserFormModal('dialog_create_show')"
            text="{{ trans_choice('words.n.new', 1) }} {{ \Str::lower(trans_choice('words.u.user', 1)) }}" />
    </x-slot:actions>

    {{-- more contents --}}
    <x-slot:prepend-list>
        <x-shared.dialog
            title="{{ trans_choice('words.n.new', 1) }} {{ \Str::lower(trans_choice('words.u.user', 1)) }}"
            id="dialog_create_show">
            <x-shared.form.form
                wire:submit='saveUser'
                method="post"
                action="#"
                submit-text="{{ trans_choice('words.r.register', 3) }} {{ trans_choice('words.u.user', 1) }}">
                <div class="col-span-12">
                </div>
                @include('livewire.shared.includes.user-basic-data', [
                    'creating' => true,
                    'formName' => 'formUserCreate',
                ])
            </x-shared.form.form>
        </x-shared.dialog>

        <x-shared.dialog
            title="{{ trans_choice('words.u.update', 1) }} {{ \Str::lower(trans_choice('words.u.user', 1)) }}"
            id="dialog_update_show">
            <x-shared.form.form
                wire:submit='updateUser'
                method="post"
                action="#"
                submit-text="{{ trans_choice('words.u.update', 1) }} {{ trans_choice('words.u.user', 1) }}">
                <div class="col-span-12">
                </div>
                @include('livewire.shared.includes.user-basic-data', [
                    'creating' => false,
                    'formName' => 'formUserUpdate',
                ])
            </x-shared.form.form>
        </x-shared.dialog>
    </x-slot:prepend-list>

</x-shared.panel.page-list>
