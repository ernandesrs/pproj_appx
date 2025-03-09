<div class="flex flex-col">
    @if (!$withoutTitle && (!empty($title) || isset($actions)))
        <div class="
            flex items-center
            w-full
            mb-4">
            <div class="flex flex-col gap-x-3">
                @if (!empty($title) && !$withoutTitle)
                    <h1 class="font-semibold text-lg md:text-xl">
                        {{ $title }}
                    </h1>
                @endif
                {{ $breadcrumb ?? null }}
            </div>
            <div class="ml-auto">
                {{ $actions ?? null }}
            </div>
        </div>
    @endif

    <div class="
        grid grid-cols-12 gap-5">
        <x-shared.feedback class="col-span-12" id="admin" />

        {{ $slot }}
    </div>
</div>
