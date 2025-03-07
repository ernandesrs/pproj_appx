<{{ $asLink ? 'a' : 'button' }}
    {{ $attributes->merge([
        'class' => implode(' ', [
            'flex items-center',
            'border',
            [
                'primary' => [
                    'filled' => 'bg-primary border-primary text-zinc-100 dark:bg-primary-dark dark:border-primary-dark',
                    'outlined' => 'border-primary text-primary dark:border-primary-dark dark:text-primary-dark',
                    'flat' => 'text-primary border-transparent dark:text-primary-dark',
                ],
                'secondary' => [
                    'filled' =>
                        'bg-secondary border-secondary text-zinc-100 dark:bg-secondary-dark dark:border-secondary-dark',
                    'outlined' => 'border-secondary text-secondary dark:border-secondary-dark dark:text-secondary-dark',
                    'flat' => 'text-secondary border-transparent dark:text-secondary-dark',
                ],
            ][$getStyle()][$getVariant()],
            'hover:scale-105 duration-300 cursor-pointer',
            ($small ? 'text-sm px-4 h-[35px]' : 'px-8 h-[45px]') . ' rounded-full',
        ]),
    ]) }}>
    <span class="pointer-events-none">
        @if ($prependIcon)
            <x-shared.icon :icon="$prependIcon" prepend />
        @endif
        <span>{{ $text }}</span>
        @if ($appendIcon)
            <x-shared.icon :icon="$appendIcon" append />
        @endif
    </span>
    </{{ $asLink ? 'a' : 'button' }}>
