@push('dialogs')
    <x-shared.dialog
        id="dialog_example_1"
        icon="plus-lg"
        title="Dialog title" size="base">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, maiores autem asperiores accusamus dignissimos
            quaerat et velit tempora mollitia eos qui voluptatem magni provident rerum iure iusto repellat. Dolores, quas.
        </p>
    </x-shared.dialog>
@endpush

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
                text="Primary small" small />
            <x-shared.clickable
                icon="arrow-up"
                style="primary"
                variant="filled" small />
            <x-shared.clickable
                icon="arrow-up"
                style="primary"
                variant="filled" />
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
                style="primary"
                variant="filled"
                text="External link"
                as-link
                href="https://google.com"
                target="_blank" />
            <x-shared.clickable
                prepend-icon="person-circle"
                style="primary"
                variant="filled"
                text="Link interno"
                as-link
                wire:navigate
                href="{{ route('admin.profile') }}" />
            <x-shared.clickable
                prepend-icon="arrow-left"
                append-icon="arrow-right"
                style="primary"
                variant="filled"
                text="With icons" />
        </div>
    </x-shared.card>

    <x-shared.card
        class="col-span-12"
        icon="collection"
        title="Outros botões">
        <div class="flex flex-wrap gap-2 items-center justify-center">
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="filled"
                text="Primary" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="outlined"
                text="Primary" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="flat"
                text="Primary" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="secondary"
                variant="filled"
                text="Secondary" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="secondary"
                variant="outlined"
                text="Secondary" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="secondary"
                variant="flat"
                text="Secondary" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="success"
                variant="filled"
                text="Success" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="success"
                variant="outlined"
                text="Success" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="success"
                variant="flat"
                text="Success" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="info"
                variant="filled"
                text="Info" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="info"
                variant="outlined"
                text="Info" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="info"
                variant="flat"
                text="Info" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="danger"
                variant="filled"
                text="Danger" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="danger"
                variant="outlined"
                text="Danger" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="danger"
                variant="flat"
                text="Danger" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="warning"
                variant="filled"
                text="Warning" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="warning"
                variant="outlined"
                text="Warning" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="warning"
                variant="flat"
                text="Warning" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="light"
                variant="filled"
                text="Light" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="light"
                variant="outlined"
                text="Light" />
            <x-shared.clickable
                prepend-icon="arrow-up"
                style="light"
                variant="flat"
                text="Light" />

            <x-shared.clickable
                prepend-icon="arrow-up"
                style="primary"
                variant="filled"
                text="Square"
                square />
        </div>
    </x-shared.card>

</x-shared.panel.page-base>
