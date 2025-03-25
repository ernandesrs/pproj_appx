<div
    x-on:evt__theme.window="themeChange"
    x-data="{
        id: '{{ $id }}',
        configuration: {{ json_encode($chart->toArray()) }},
        chartInstance: null,
        colors: {{ json_encode($chart->getColors()) }},

        init() {
            this.chartInstance = new window['apexCharts']($el, {
                ...this.configuration,
                colors: Object.values(this.colors['light'])
            });
            this.chartInstance.render();
        },

        themeChange(event) {
            this.chartInstance.theme.w.config.colors = Object.values(this.colors[event.detail?.theme == 'dark' ? 'dark' : 'light']);
            this.chartInstance.update()
        }
    }"
    {{ $attributes }}>
</div>
