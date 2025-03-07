@php
    $baseClass = implode(' ', [
        'duration-100',

        'bg-zinc-100 focus:bg-white dark:bg-zinc-900 dark:focus:bg-zinc-800 disabled:bg-zinc-200 dark:disabled:bg-zinc-600',

        !in_array($type, ['checkbox', 'radio']) ? 'w-full ' . ($small ? 'h-[35px] text-sm' : 'h-[45px]') : '',

        'border focus:border-zinc-400 outline-none dark:focus:border-zinc-700 px-5' . ($square ? '' : ' rounded-xl'),

        // border/text
        empty($error)
            ? 'border-zinc-300 dark:border-zinc-800'
            : 'border-danger text-danger dark:border-danger-dark dark:text-danger-dark',
    ]);
@endphp

<div {{ $attributes->only(['class']) }}>
    @if (in_array($type, ['text', 'email', 'password', 'number', 'date']))
        <input
            {{ $attributes->merge([
                'class' => $baseClass,
                'type' => $type,
                'name' => $name,
            ]) }} />
    @endif

</div>
