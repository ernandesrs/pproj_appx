<x-shared.dropdown :location="$getLocation()">
    <x-slot:activator>
        <div class="cursor-pointer">
            {{ $activator }}
        </div>
    </x-slot:activator>
    <x-shared.card {{ $attributes->only(['class']) }}>
        {{ $slot }}
    </x-shared.card>
</x-shared.dropdown>
