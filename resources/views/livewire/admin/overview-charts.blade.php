<div wire:poll.60s='updateChartData' class="col-span-12 grid grid-cols-12 gap-5">
    <x-shared.card class="col-span-12 sm:col-span-6">
        <x-shared.charts.chart id="example_area_1" :chart="$area" />
    </x-shared.card>

    <x-shared.card class="col-span-12 sm:col-span-6">
        <x-shared.charts.chart id="example_line_1" :chart="$line" />
    </x-shared.card>
</div>
