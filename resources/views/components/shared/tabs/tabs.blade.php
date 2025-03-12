<div
    x-data="{
        selected: '{{ \Str::slug($selected) }}',

        init() {
            this.show(this.selected);
        },

        changeTab(tabName) {
            this.hidden(this.selected);
            this.show(tabName);
        },

        show(tabName) {
            const tabItem = $el.querySelector('#' + tabName);

            if (!tabItem) return;

            this.selected = tabName;
            tabItem.classList.remove('hidden');
        },

        hidden(tabName) {
            const tabItem = $el.querySelector('#' + tabName);

            if (!tabItem) return;

            tabItem.classList.add('hidden');
        }
    }"

    {{ $attributes->merge([
        'class' => 'flex flex-col',
    ]) }}>
    <div class="relative w-full px-5 flex flex-nowrap justify-start lg:justify-center overflow-x-auto">
        @foreach ($tabs as $tab)
            <a
                x-on:click="changeTab('{{ \Str::slug($tab['name']) }}')"

                class="flex flex-nowrap text-nowrap border border-b-[3px] rounded-t-lg px-5 py-3"
                :class="{
                    'pointer-events-none border-zinc-300 border-b-primary bg-zinc-100 dark:border-zinc-800 dark:border-b-primary-dark dark:bg-zinc-900': selected ==
                        '{{ \Str::slug($tab['name']) }}',
                    'border-transparent': selected !=
                        '{{ \Str::slug($tab['name']) }}'
                }"
                href="#">
                @if (!empty($tab['icon']))
                    <x-shared.icon :icon="$tab['icon']" />
                @endif
                @if (!$onlyIcon)
                    <span class="ml-1">
                        {{ $tab['name'] }}
                    </span>
                @endif
            </a>
        @endforeach
    </div>
    <x-shared.card class="w-full">
        {{ $slot }}
    </x-shared.card>
</div>
