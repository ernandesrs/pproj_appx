<div class="flex items-start gap-y-1 flex-col">
    <span>
        {{ $item->first_name }} {{ $item->last_name }}
    </span>
    @if ($item->hasAnyRole(\App\Enums\AdminRolesEnum::cases()))
        @foreach ($item->roles()->get() as $role)
            <span class="bg-success dark:bg-success-dark px-2 text-xs rounded-lg overflow-hidden relative">
                {{ $role->name->label() }}
            </span>
        @endforeach
    @else
        <span class="bg-light dark:bg-light-dark px-2 text-xs rounded-lg overflow-hidden relative">
            {{ trans_choice('words.u.user', 1) }}
        </span>
    @endif
    </span>
</div>
