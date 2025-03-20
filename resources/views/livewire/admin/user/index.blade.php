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
        <x-shared.dialog-confirmation
            id="user_delete_confirmation" />

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

        <x-shared.dialog
            title="{{ trans_choice('words.d.delete', 2) }} {{ \Str::lower(trans_choice('words.o.of', 1)) }} {{ \Str::lower(trans_choice('words.u.user', 1)) }}"
            id="dialog_user_delete_show">

            <p>
                {{ __('messages.alerts.user_delete_confirmation', ['text' => $userDelete?->first_name . ' ' . $userDelete?->last_name]) }}
            </p>

            <div class="mt-3 flex justify-between items-center gap-2">
                <x-shared.clickable
                    wire:click='userDeleteConfirmed'
                    prepend-icon="check-lg"
                    text="{{ trans_choice('words.c.confirm', 1) }}"
                    style="danger" />

                <x-shared.clickable
                    x-on:click="$dispatch('evt__dialog_close', {id: 'dialog_user_delete_show'})"
                    prepend-icon="check-lg"
                    text="{{ trans_choice('words.c.cancel', 1) }}"
                    style="light"
                    variant="flat" />
            </div>
        </x-shared.dialog>
    </x-slot:prepend-list>

</x-shared.panel.page-list>
