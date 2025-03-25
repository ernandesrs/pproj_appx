<div
    x-on:evt__theme.window="themeChange"
    x-data="{
        id: '{{ $id }}',
        configuration: {{ json_encode($chart->toArray()) }},
        chartInstance: null,
        colors: {{ json_encode($chart->getColors()['colors']) }},
        texts: {{ json_encode($chart->getColors()['text']) }},

        init() {
            this.chartInstance = new window['apexCharts']($el, {
                ...this.configuration
            });

            this.setColors();

            this.chartInstance.render();
        },

        themeChange(event) {
            this.setColors(event.detail?.theme == 'dark' ? 'dark' : 'light');
            this.chartInstance.update()
        },

        setColors(theme = null) {
            var theme = theme ?? 'light';

            {{-- colors --}}
            this.chartInstance.theme.w.config.colors = this.configuration?.customColors ?
                this.configuration?.customColors[theme] :
                this.colors[theme];

            {{-- primary texts --}}
            var primaryText = this.texts[theme][0];

            this.chartInstance.theme.w.config.title.style.color = primaryText;
            this.chartInstance.theme.w.config.title.style.fontFamily = 'Roboto';
            this.chartInstance.theme.w.config.title.style.fontWeight = 'bold';

            this.chartInstance.theme.w.config.xaxis.title.style.color = primaryText;
            this.chartInstance.theme.w.config.xaxis.title.style.fontWeight = 'bold';

            this.chartInstance.theme.w.config.yaxis[0].title.style.color = primaryText;
            this.chartInstance.theme.w.config.yaxis[0].title.style.fontWeight = 'bold';

            {{-- secondary texts --}}
            var secondaryText = this.texts[theme][1];

            this.chartInstance.theme.w.config.legend.markers.offsetX = -3;
            this.chartInstance.theme.w.config.legend.labels.colors = secondaryText;

            this.chartInstance.theme.w.config.xaxis.labels.style.colors = secondaryText;
            this.chartInstance.theme.w.config.yaxis[0].labels.style.colors = secondaryText;
        }
    }"
    {{ $attributes }}>
</div>
