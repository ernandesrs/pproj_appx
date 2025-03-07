<nav class="
    flex flex-col">
    @foreach ($menuItems as $menuItem)
        @isset($menuItem['items'])
        @else
            <x-shared.panel.sidebar.menu-item
                :icon="$menuItem['icon']"
                :href="$menuItem['href']"
                :text="$menuItem['text']"
                :active="in_array(\Route::currentRouteName(), $menuItem['activeIn'] ?? [])" />
        @endisset
    @endforeach
</nav>
