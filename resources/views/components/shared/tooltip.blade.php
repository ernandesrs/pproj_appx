<x-shared.dropdown :location="$getLocation()">
    <x-slot:activator>
        <div class="cursor-pointer">
            {{ $activator }}
        </div>
    </x-slot:activator>
    <x-shared.card {{ $attributes->only(['class'])->merge(['class'=>'!bg-zinc-800 text-zinc-200 dark:!bg-black dark:text-zinc-400']) }}>
        {{ $slot }}
    </x-shared.card>
</x-shared.dropdown>
