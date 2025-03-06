<x-shared.panel.page-base
    title="Visão geral"
    without-title>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae sit libero sed, velit assumenda eveniet
            quod voluptates quos, reprehenderit quaerat veniam commodi dolore nobis quae, officia dolorum accusamus
            ratione nihil!</p>
    </x-shared.card>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4"
        icon="arrow-up-circle"
        title="With icon and title">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae sit libero sed, velit assumenda eveniet
            quod voluptates quos, reprehenderit quaerat veniam commodi dolore nobis quae, officia dolorum accusamus
            ratione nihil!</p>
    </x-shared.card>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4"
        title="With actions">
        <x-slot:actions>
            <button class="px-2 py-1 bg-zinc-300 dark:bg-zinc-700 rounded cursor-pointer">Action #1</button>
        </x-slot:actions>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae sit libero sed, velit assumenda eveniet
            quod voluptates quos, reprehenderit quaerat veniam commodi dolore nobis quae, officia dolorum accusamus
            ratione nihil!</p>
    </x-shared.card>

</x-shared.panel.page-base>
