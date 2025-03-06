<div
    {{ $attributes->merge([
        'class' => implode(' ', [
            'flex items-start',
            [
                'h1' => 'text-xl md:text-2xl text-zinc-700 dark:text-zinc-200',
                'h2' => 'text-lg md:text-xl text-zinc-600 dark:text-zinc-300',
                'h3' => 'text-base md:text-lg text-zinc-500 dark:text-zinc-400',
                'h4' => 'text-sm md:text-base text-zinc-400 dark:text-zinc-500',
                'h5' => 'text-xs md:text-sm text-zinc-400 dark:text-zinc-600',
            ][$getTag()],
        ]),
    ]) }}>
    @if (!empty($icon))
        <x-shared.icon :icon="$icon" prepend />
    @endif
    <{{ $getTag() }}>{{ $title }}</{{ $getTag() }}>
</div>
