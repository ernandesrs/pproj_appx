<a class="
    {{ $active ? 'bg-primary dark:bg-primary-dark' : 'hover:bg-zinc-100 text-zinc-500 dark:hover:bg-zinc-900 dark:text-zinc-400' }}
    text-zinc-100 font-semibold
    px-5 py-3 hover:pl-6 duration-200 rounded-full mb-1
    {{ $active ? 'pl-6' : '' }}"
    href="{{ $href }}">
    <x-shared.icon :icon="$icon" prepend />
    <span>{{ $text }}</span>
</a>
