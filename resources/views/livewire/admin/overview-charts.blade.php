<div wire:poll.60s='updateChartData' class="col-span-12 grid grid-cols-12 gap-5">
    <x-shared.card class="col-span-12 sm:col-span-6 xl:col-span-4">
        <x-shared.charts.chart id="chart_1" :chart="$chart1" />
    </x-shared.card>
    <x-shared.card class="col-span-12 xl:col-span-8">
        <x-shared.charts.chart id="chart_2" :chart="$chart2" />
    </x-shared.card>
</div>
