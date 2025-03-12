@php
    $labelClass = (!$inline ? 'text-xs' : 'font-semibold') . ' text-zinc-500 dark:text-zinc-500 flex items-center';
    $textClass = $inline ? '' : 'font-semibold';
@endphp

<div
    {{ $attributes->merge([
        'class' => implode(' ', [
            // base
            'flex flex-wrap gap-x-1 cursor-default ' . ($inline ? 'flex-row items-center' : 'flex-col'),

            // colors
            'text-zinc-500 dark:text-zinc-400',
        ]),
    ]) }}>
    <span class="{{ $labelClass }}">
        <span>{{ $label }}</span>
        @if (isset($tooltip) || !empty($tooltipText))
            <x-shared.tooltip
                class="mx-1"
                :location="$getTooltipLocaltion">
                <x-slot:activator>
                    <x-shared.icon icon="info-circle" append />
                </x-slot:activator>
                @if (!empty($tooltipText))
                    <span>{{ $tooltipText }}</span>
                @elseif (isset($tooltip))
                    {{ $tooltip }}
                @endif
            </x-shared.tooltip>
        @endif
        <span>:</span>
    </span>
    <span class="{{ $textClass }}">{{ $text }}</span>
</div>
