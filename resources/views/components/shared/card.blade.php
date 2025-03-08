<div
    {{ $attributes->merge([
        'class' => implode(' ', [
            'bg-zinc-100 relative dark:bg-zinc-900',
            'border border-zinc-300 rounded dark:border-zinc-800',
        ]),
    ]) }}>

    @if ($showHeader())
        <div class="
            flex items-center
            px-5 pt-4 pb-0">
            @if (!empty($title))
                <div
                    class="
                    text-zinc-600 dark:text-zinc-300
                    font-semibold lg:text-lg cursor-default">
                @empty($icon)
                    <x-shared.heading :tag="$titleTag" :title="$title" />
                @else
                    <x-shared.heading :tag="$titleTag" :icon="$icon" :title="$title" />
                @endempty
            </div>
        @endif
        @isset($actions)
            <div class="ml-auto flex gap-x-1">
                {{ $actions }}
            </div>
        @endisset
    </div>
@endif

<div class="grid grid-cols-12 px-5 {{ $showHeader() ? 'pb-4 py-2' : 'py-4' }}">
    {{ $content ?? $slot }}
</div>

</div>
