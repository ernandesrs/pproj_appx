<div class="flex items-center">
    <x-shared.clickable
        wire:loading.class='pointer-events-none animation-pulse'
        wire:click="openUserFormModal('dialog_update_show', {{ $item->id }})"
        icon="pencil"
        small />
</div>
