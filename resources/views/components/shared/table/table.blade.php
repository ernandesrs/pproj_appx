<div {{ $attributes->merge([
    'class' => 'overflow-x-auto',
]) }}>
    <div
        class="
        w-full table table-auto
        bg-zinc-100 dark:bg-zinc-900
        border border-zinc-300 dark:border-zinc-800 rounded-xl overflow-hidden
        ">
        {{--  --}}
        <div class="
            table-header-group
            ">
            {{ $theader ?? null }}
        </div>

        {{-- body --}}
        <div class="
            table-row-group
            ">
            {{ $tbody ?? $slot }}
        </div>
    </div>
</div>
