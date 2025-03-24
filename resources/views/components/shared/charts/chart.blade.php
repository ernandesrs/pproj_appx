<div x-data="{
    id: '{{ $id }}',
    configuration: {{ json_encode($chart->toArray()) }},
    chartInstance: null,

    init() {
        this.chartInstance = new window['apexCharts']($el, this.configuration);
        this.chartInstance.render();
    }
}"
    {{ $attributes }}>
</div>
