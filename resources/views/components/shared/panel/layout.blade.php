<div
    x-data="{
        visibleSidebar: false,

        init() {
            this.setTheme(this.getTheme() ?? 'light');
            $nextTick(() => {
                $dispatch('evt__theme', { theme: this.getTheme() });
            });
        },

        toggleTheme() {
            this.setTheme(this.getTheme() == 'dark' ? 'light' : 'dark');
        },

        setTheme(theme) {
            localStorage.setItem('theme', theme);

            const base = document.querySelector('html');
            if (theme == 'dark') {
                base.classList.remove('light');
                base.classList.add('dark');
            } else {
                base.classList.remove('dark');
                base.classList.add('light');
            }

            $dispatch('evt__theme', { theme: theme });
        },

        getTheme() {
            return localStorage.getItem('theme');
        }
    }"
    class="
    flex relative
    w-full h-screen overflow-hidden
    text-zinc-700 dark:text-zinc-400">

    {{-- left side --}}
    <div
        :class="{ '-translate-x-full': !visibleSidebar }"
        class="
        w-[88vw] sm:w-[275px] h-screen fixed lg:translate-x-0 lg:relative z-40 overflow-y-auto
        bg-zinc-200 dark:bg-zinc-950
        border-r border-zinc-300 dark:border-zinc-900
        p-5">
        {{ $sidebar ?? null }}
    </div>

    {{-- right sidebar --}}
    <div
        class="
        w-full h-screen relative
        bg-gradient-to-l from-zinc-100 to-zinc-200 dark:from-zinc-900 dark:to-zinc-950">

        {{-- header --}}
        <div
            class="
            w-full h-[50px]
            flex items-center relative
            border-b border-zinc-300 dark:border-zinc-900
            px-5">
            <div class="flex gap-2">
                {{ $prepend ?? null }}
            </div>
            {{ $header ?? null }}
            <div class="flex gap-2 ml-auto">
                {{ $append ?? null }}
                <x-shared.clickable
                    class="hover:!scale-100"
                    x-on:click="toggleTheme"
                    style="light"
                    variant="flat"
                    icon="brightness-high-fill" />
                <button
                    class="lg:hidden ml-auto text-xl cursor-pointer"
                    x-on:click="visibleSidebar = !visibleSidebar">
                    <x-shared.icon icon="list" />
                </button>
            </div>
        </div>

        {{-- content/footer --}}
        <div class="
            relative overflow-y-auto
            flex flex-col"
            style="height: calc(100vh - 50px)">

            {{-- content --}}
            <div class="flex-1 grid gap-5 p-5">
                {{ $content ?? null }}
            </div>

            {{-- footer --}}
            @isset($footer)
                <div
                    class="
                    w-full min-h-[50px]
                    border-t border-zinc-300 dark:border-zinc-900
                    p-5">
                    {{ $footer }}
                </div>
            @endisset
        </div>

    </div>

    @stack('dialogs')
</div>
