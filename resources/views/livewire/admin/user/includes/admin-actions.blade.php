<div class="flex items-center gap-2">
    @can('update', $item)
        <x-shared.clickable
            wire:loading.class='pointer-events-none animation-pulse'
            wire:click="chooseUserToPromote({{ $item->id }}, 1)"
            prepend-icon="gear"
            text="{{ trans_choice('words.m.manage', 1) }} {{ \Str::lower(trans_choice('words.r.role', 2)) }}"
            small />
    @endcan
</div>
