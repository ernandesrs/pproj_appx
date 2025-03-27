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

    <x-shared.dialog-confirmation
        id="dialog_confirmation_example_1" />
@endpush

<x-shared.panel.page-base :page="$page">

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-shared.charts.chart
            id="chart_1"
            :chart="\App\Support\ChartCreator::radial()
                ->withTotal(null)
                ->addSerie('Serie #1', 10)
                ->addSerie('Serie #2', 20)
                ->addSerie('Serie #3', 10)
                ->addSerie('Serie #4', 80)" />
    </x-shared.card>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-shared.charts.chart
            id="chart_1"
            :chart="\App\Support\ChartCreator::donut()
                ->addSerie('Serie #1', 10)
                ->addSerie('Serie #2', 20)
                ->addSerie('Serie #3', 10)
                ->addSerie('Serie #4', 80)" />
    </x-shared.card>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-shared.charts.chart
            id="chart_1"
            :chart="\App\Support\ChartCreator::pie()
                ->addSerie('Serie #1', 10)
                ->addSerie('Serie #2', 20)
                ->addSerie('Serie #3', 10)
                ->addSerie('Serie #4', 80)" />
    </x-shared.card>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-shared.charts.chart
            id="chart_2"
            :chart="\App\Support\ChartCreator::bar()
                ->addSeries('Serie #1', [20, 5, 12, 8])
                ->addSeries('Serie #2', [10, 15, 10, 18])
                ->addSeries('Serie #3', [5, 7, 15, 8])" />
    </x-shared.card>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-shared.charts.chart
            id="chart_3"
            :chart="\App\Support\ChartCreator::area()
                ->addSeries('Serie #1', [20, 5, 12, 8])
                ->addSeries('Serie #2', [10, 15, 12, 18])" />
    </x-shared.card>

    <x-shared.card
        class="col-span-12 sm:col-span-6 lg:col-span-4">
        <x-shared.charts.chart
            id="chart_4"
            :chart="\App\Support\ChartCreator::line('Line title')
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR'], 'Horizontal label')
                ->addVerticalInfo(-5, 25, 'Vertical label')
                ->addSeries('Serie #1', [20, 5, 12, 8])
                ->addSeries('Serie #2', [10, 15, 12, 18])" />
    </x-shared.card>

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
        class="col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-6"
        icon="collection"
        title="Botões">
        <x-shared.tabs.tabs
            class="col-span-12"
            :tabs="[
                [
                    'name' => 'Examplos básicos',
                ],
                [
                    'name' => 'Estilos e variações',
                ],
            ]"
            selected="Examplos básicos">
            <x-shared.tabs.tab-item name="Examplos básicos">
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
                        variant="filled"
                        text="Primary" square />
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
                    <x-shared.clickable
                        prepend-icon="arrow-left"
                        append-icon="arrow-right"
                        style="primary"
                        variant="filled"
                        text="Loading" loading />
                    <x-shared.clickable
                        prepend-icon="square"
                        style="primary"
                        variant="filled"
                        text="Loading" loading />
                    <x-shared.clickable
                        icon="square"
                        style="primary"
                        variant="filled" loading />
                </div>
            </x-shared.tabs.tab-item>
            <x-shared.tabs.tab-item name="Estilos e variações">
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
            </x-shared.tabs.tab-item>
        </x-shared.tabs.tabs>
    </x-shared.card>

    <x-shared.card
        class="col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-6"
        icon="card-heading"
        title="Textos">
        <x-shared.tabs.tabs :tabs="[
            [
                'name' => 'Texto com informação',
            ],
            [
                'name' => 'Títulos',
            ],
        ]" selected="Texto com informação">
            <x-shared.tabs.tab-item name="Texto com informação">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6">
                        <x-shared.labeled-info-text label="Label" text="Labeled text"
                            tooltip-location="left" />
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <x-shared.labeled-info-text label="Label" text="Labeled text" inline
                            tooltip-location="left" />
                    </div>
                    <div class="col-span-12">
                        <x-shared.labeled-info-text label="Label" text="Labeled text with tooltip"
                            tooltip-text="Lorem ipsum dolor sit amet consectetur adipisicing elit"
                            tooltip-location="left" />
                    </div>
                </div>
            </x-shared.tabs.tab-item>
            <x-shared.tabs.tab-item name="Títulos">
                <x-shared.heading title="Lorem heading with icon" tag="h1" icon="arrow-up-circle" />
                <x-shared.heading title="Lorem dolor heading text h1" tag="h1" />
                <x-shared.heading title="Lorem dolor heading text h2" tag="h2" />
                <x-shared.heading title="Lorem dolor heading text h3" tag="h3" />
                <x-shared.heading title="Lorem dolor heading text h4" tag="h4" />
                <x-shared.heading title="Lorem dolor heading text h5" tag="h5" />
            </x-shared.tabs.tab-item>
        </x-shared.tabs.tabs>

        <hr class="my-5 border border-zinc-300 dark:border-zinc-800">
        <x-shared.feedback id="{{ uniqid() }}"
            type="info"
            title="Título do feedback!"
            message="Este é um feedback com dados fixos definidos via propriedades do componente de feedback." />
        <hr class="my-5 border border-zinc-300 dark:border-zinc-800">

        <div

            {{-- dialog confirmation --}}
            x-on:evt__confirmation_confirmed.window="alert('Confirmed!')"
            x-on:evt__confirmation_canceled.window="alert('Canceled!')"

            class="flex justify-center flex-wrap gap-2">
            <x-shared.dialog-activator
                controls="dialog_example_1"
                text="Abrir dialog" sm />

            <x-shared.dialog-activator
                controls="dialog_confirmation_example_1"
                text="Dialog de confirmação" />

            <x-shared.clickable wire:click='emitFeedbackTest' text="Emitir feedback teste" sm />
        </div>

    </x-shared.card>

</x-shared.panel.page-base>
