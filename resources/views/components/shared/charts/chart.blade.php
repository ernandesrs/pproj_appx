<div
    x-on:evt__theme.window="themeChange"
    x-data="{
        id: '{{ $id }}',
        configuration: {{ json_encode($chart->toArray()) }},
        chartInstance: null,

        init() {
            this.chartInstance = new window['apexCharts']($el, {
                ...this.configuration,
                theme: {
                    {{-- mode: 'light', --}}
                    palette: 'palette10',
                    monochrome: {
                        enabled: true,
                        color: '#4f39f6',
                        shadeTo: 'light',
                        shadeIntensity: 0.65
                    },
                }
            });
            this.chartInstance.render();
        },

        themeChange(event) {
            this.chartInstance.theme.w.config.theme.monochrome.shadeTo = event?.detail?.theme == 'dark' ? 'dark' : 'light';
            this.chartInstance.update()
        }
    }"
    {{ $attributes }}>
</div>
