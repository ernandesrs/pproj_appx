<x-shared.dropdown :location="$getLocation()">
    <x-slot:activator>
        <div class="cursor-pointer">
            {{ $activator }}
        </div>
    </x-slot:activator>
    <x-shared.card {{ $attributes->only(['class'])->merge(['class'=>'!bg-zinc-800 dark:!bg-black']) }}>
        {{ $slot }}
    </x-shared.card>
</x-shared.dropdown>
