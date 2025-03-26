<div class="flex items-center gap-x-1">
    @php
        $roles = $item->roles()->get();
    @endphp
    @if ($roles->count())
        @foreach ($roles as $role)
            <span
                class="bg-success dark:bg-success-dark text-zinc-100 dark:text-zinc-300 px-2 text-xs rounded-lg overflow-hidden relative">
                {{ $role->getName() }}
            </span>
        @endforeach
    @else
        <span class="bg-light dark:bg-light-dark px-2 text-xs rounded-lg overflow-hidden relative">
            {{ trans_choice('words.u.user', 1) }}
        </span>
    @endif
</div>
