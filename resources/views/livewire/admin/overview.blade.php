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

    <x-shared.card
        class="col-span-12 md:col-span-6"
        icon="card-heading"
        title="Heading">
        <x-shared.heading title="Lorem heading with icon" tag="h1" icon="arrow-up-circle" />
        <x-shared.heading title="Lorem dolor heading text h1" tag="h1" />
        <x-shared.heading title="Lorem dolor heading text h2" tag="h2" />
        <x-shared.heading title="Lorem dolor heading text h3" tag="h3" />
        <x-shared.heading title="Lorem dolor heading text h4" tag="h4" />
        <x-shared.heading title="Lorem dolor heading text h5" tag="h5" />
    </x-shared.card>

    <x-shared.card
        class="col-span-12 md:col-span-6"
        icon="collection"
        title="Botões">

        <div class="flex flex-wrap gap-2 items-center justify-center">
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="filled"
                text="Primary" small />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="filled"
                text="Primary" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="outlined"
                text="Primary outlined" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="flat"
                text="Primary flat" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="secondary"
                variant="filled"
                text="Secondary" small />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="secondary"
                variant="filled"
                text="Secondary" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="secondary"
                variant="outlined"
                text="Secondary outlined" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="secondary"
                variant="flat"
                text="Secondary" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="filled"
                text="As link"
                as-link
                href="https://google.com.br"
                target="_blank" />

            <x-shared.clickable
                prepend-icon="person-circle"
                style="primary"
                variant="filled"
                text="Profile"
                as-link
                wire:navigate
                href="{{ route('admin.profile') }}" />
        </div>

    </x-shared.card>

</x-shared.panel.page-base>
