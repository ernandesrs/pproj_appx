<div
    {{ $attributes->merge([
        'class' => implode(' ', [
            'table-cell ' . ($headerCell ? 'px-3 py-4 font-medium' : 'p-3'),
            'border-b border-zinc-200 dark:border-zinc-800',
            'text-zinc-500 dark:text-zinc-300',
        ]),
    ]) }}>
    @empty($value)
        {{ $slot }}
    @else
        {{ $value }}
    @endempty
</div>
