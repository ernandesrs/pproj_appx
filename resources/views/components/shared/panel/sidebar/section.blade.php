<div
    class="mb-4">
    <x-shared.heading
        class="font-semibold cursor-default" tag="h5" :title="$title" />
    <div class="mt-2">
        @if (count($menuItems))
            <x-shared.panel.sidebar.menu
                :menu-items="$menuItems" />
        @else
            {{ $slot }}
        @endif
    </div>
</div>
