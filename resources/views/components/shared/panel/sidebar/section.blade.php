<div
    class="mb-4">
    <x-shared.heading
        class="font-semibold cursor-default" tag="h5" :title="$title" />
    <div class="bg-red-500 mt-2">
        @if (count($menuItems))
        @else
            {{ $slot }}
        @endif
    </div>
</div>
