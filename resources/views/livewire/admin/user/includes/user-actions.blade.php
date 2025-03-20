<div class="flex items-center gap-2">
    <x-shared.clickable
        wire:loading.class='pointer-events-none animation-pulse'
        wire:click="openUserFormModal('dialog_update_show', {{ $item->id }})"
        icon="pencil"
        small />

    <x-shared.clickable
        wire:loading.class='pointer-events-none animation-pulse'
        wire:click="deleteUserConfirmation({{ $item->id }})"
        style="danger"
        variant="filled"
        icon="trash"
        small />

    <x-shared.dialog-activator
        controls="user_delete_confirmation"
        style="danger"
        variant="filled"
        icon="trash"
        small />
</div>
