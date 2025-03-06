<div
    x-data="{
        visibleSidebar: false
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
            {{ $header ?? null }}
            <button
                class="lg:hidden ml-auto bg-zinc-400 px-3 py-2 rounded-lg cursor-pointer"
                x-on:click="visibleSidebar = !visibleSidebar">
                MENU
            </button>
        </div>

        {{-- content/footer --}}
        <div class="
            relative overflow-y-auto
            flex flex-col"
            style="height: calc(100vh - 50px)">

            {{-- content --}}
            <div class="flex-1 p-5">
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

</div>
