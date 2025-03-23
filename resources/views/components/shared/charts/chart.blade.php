<div x-data="{
    id: '{{ $id }}',
    configuration: {{ json_encode($chart->toArray()) }},
    chartInstance: null,

    init() {
        var options = {
            chart: {
                type: this.configuration.type
            },
            series: [{
                name: 'sales',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        };

        this.chartInstance = new window['apexCharts']($el, options);

        this.chartInstance.render();
    }
}"
    {{ $attributes }}>
    <!-- When there is no desire, all things are at peace. - Laozi -->
</div>
