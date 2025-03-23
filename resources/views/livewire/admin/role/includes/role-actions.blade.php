<div class="flex items-center gap-2">
    @can('update', $item)
        <x-shared.clickable
            wire:loading.class='loading'
            wire:target="openRoleFormModal('dialog_role_update', {{ $item->id }})"
            wire:click="openRoleFormModal('dialog_role_update', {{ $item->id }})"
            icon="pencil"
            small />
    @endcan

    @can('delete', $item)
        <x-shared.clickable
            wire:loading.class='loading'
            wire:target="deleteRoleConfirmation({{ $item->id }})"
            wire:click="deleteRoleConfirmation({{ $item->id }})"
            style="danger"
            variant="filled"
            icon="trash"
            small />
    @endcan
</div>
