<div class="flex flex-col">
    @if (!$page->isWithoutTitle() && (!empty($page->getTitle()) || isset($actions)))
        <div class="
            flex items-center
            w-full
            mb-4">
            <div class="flex flex-col gap-x-3">
                @if (!empty($page->getTitle()) && !$page->isWithoutTitle())
                    <h1 class="font-semibold text-lg md:text-xl">
                        {{ $page->getTitle() }}
                    </h1>
                @endif

                @if ($page->getBreadcrumbs()->count())
                    <nav
                        class="
                            flex items-center gap-x-2 mt-1
                            text-sm text-zinc-400 dark:text-zinc-500">
                        @foreach ($page->getBreadcrumbs()->all() as $key => $breadcrumb)
                            <a wire:navigate
                                class=" hover:text-primary dark:hover:text-primary-dark {{ $breadcrumb->get('active') ? 'text-zinc-600 dark:text-zinc-700 font-semibold' : '' }}"
                                href="{{ $breadcrumb->get('href') }}" title="{{ $breadcrumb->get('label') }}">
                                {{ $breadcrumb->get('label') }}
                            </a>
                            @if ($page->getBreadcrumbs()->get($key + 1))
                                <span class="cursor-default">/</span>
                            @endif
                        @endforeach
                    </nav>
                @endif
            </div>
            <div class="ml-auto">
                {{ $actions ?? null }}
            </div>
        </div>
    @endif

    <div class="
        grid grid-cols-12 gap-5">
        {{ $slot }}
    </div>
</div>
