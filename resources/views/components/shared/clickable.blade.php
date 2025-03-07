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
                'success' => [
                    'filled' => 'bg-success border-success text-zinc-100 dark:bg-success-dark dark:border-success-dark',
                    'outlined' => 'border-success text-success dark:border-success-dark dark:text-success-dark',
                    'flat' => 'text-success border-transparent dark:text-success-dark',
                ],
                'info' => [
                    'filled' => 'bg-info border-info text-zinc-100 dark:bg-info-dark dark:border-info-dark',
                    'outlined' => 'border-info text-info dark:border-info-dark dark:text-info-dark',
                    'flat' => 'text-info border-transparent dark:text-info-dark',
                ],
                'danger' => [
                    'filled' => 'bg-danger border-danger text-zinc-100 dark:bg-danger-dark dark:border-danger-dark',
                    'outlined' => 'border-danger text-danger dark:border-danger-dark dark:text-danger-dark',
                    'flat' => 'text-danger border-transparent dark:text-danger-dark',
                ],
                'warning' => [
                    'filled' => 'bg-warning border-warning text-zinc-100 dark:bg-warning-dark dark:border-warning-dark',
                    'outlined' => 'border-warning text-warning dark:border-warning-dark dark:text-warning-dark',
                    'flat' => 'text-warning border-transparent dark:text-warning-dark',
                ],
                'light' => [
                    'filled' =>
                        'bg-light border-light text-zinc-500 dark:bg-light-dark dark:border-light-dark dark:text-zinc-300',
                    'outlined' => 'border-light text-zinc-500 dark:border-light-dark dark:text-zinc-400',
                    'flat' => 'text-zinc-500 border-transparent dark:text-zinc-400',
                ],
            ][$getStyle()][$getVariant()],
            'hover:scale-105 duration-300 cursor-pointer',
            ($small ? 'text-sm px-4 h-[35px]' : 'px-8 h-[45px]') . ($square ? ' ' : ' rounded-full'),
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
