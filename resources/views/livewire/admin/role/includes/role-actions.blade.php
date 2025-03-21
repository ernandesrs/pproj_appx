<div class="flex items-center gap-2">
    @can('update', $item)
        <x-shared.clickable
            wire:loading.class='pointer-events-none animation-pulse'
            wire:click="openUserFormModal('dialog_update_show', {{ $item->id }})"
            icon="pencil"
            small />
    @endcan

    @can('delete', $item)
        <x-shared.clickable
            wire:loading.class='pointer-events-none animation-pulse'
            wire:click="deleteUserConfirmation({{ $item->id }})"
            style="danger"
            variant="filled"
            icon="trash"
            small />
    @endcan
</div>
