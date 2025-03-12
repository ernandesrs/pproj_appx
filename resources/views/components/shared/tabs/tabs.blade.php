<div
    x-data="{
        selected: '{{ \Str::slug($selected) }}',

        init() {
            this.show(this.selected);
        },

        changeTab(tabName) {
            this.hidden(this.selected);
            this.show(tabName);
            this.selected = tabName;
        },

        show(tabName) {
            const tabItem = $el.querySelector('#' + tabName);

            if (!tabItem) return;

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
    <div
        class="
            relative overflow-x-auto
            w-full flex flex-nowrap justify-start lg:justify-center
            bg-zinc-200/50 dark:bg-zinc-900
            border border-zinc-300 dark:border-zinc-800 rounded-t-lg
            px-5 pt-2">
        @foreach ($tabs as $tab)
            <a
                x-on:click="changeTab('{{ \Str::slug($tab['name']) }}')"

                class="
                    flex flex-nowrap text-nowrap
                     text-zinc-500
                    border border-b-[3px] rounded-t-lg
                    px-5 py-3"
                :class="{
                    'pointer-events-none border-zinc-300 border-b-primary bg-zinc-100 dark:border-zinc-800 dark:border-b-primary-dark dark:bg-zinc-800/50': selected ==
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
    <div
        class="
            border border-t-0 bg-zinc-100 border-zinc-300 dark:bg-zinc-800/50 dark:border-zinc-800
            rounded-b-lg
            py-4 px-5">
        {{ $slot }}
    </div>
</div>
