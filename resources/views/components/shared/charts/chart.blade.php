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

            this.setConfigurations();
            this.setColors();
            this.chartInstance.render();
        },

        themeChange(event) {
            this.setColors(event.detail?.theme == 'dark' ? 'dark' : 'light');
            this.chartInstance.update()
        },

        setConfigurations() {
            if (this.configuration.chart.type == 'radialBar') {
                this.chartInstance.theme.w.config.plotOptions.radialBar.dataLabels.value.formatter = function(w, x) {
                    return w + '';
                };

                this.chartInstance.theme.w.config.plotOptions.radialBar.dataLabels.total.formatter = function(w, x) {
                    var sum = 0;

                    w.globals.series.map((n) => sum += n);

                    return sum + '';
                };
            }

            this.chartInstance.theme.w.config.legend.formatter = function(w) {
                return w;
            };

            if (['donut', 'pie'].includes(this.configuration.chart.type)) {
                this.chartInstance.theme.w.config.dataLabels.formatter = function(w, x) {
                    var index = x.seriesIndex;
                    var serieValue = x.w.config.series[index];
                    return serieValue + ' (' + Math.floor(w).toFixed(0) + '%)';
                };
            }

            this.chartInstance.theme.w.config.title.style.fontFamily = 'Roboto';
            this.chartInstance.theme.w.config.title.style.fontWeight = 'bold';
            this.chartInstance.theme.w.config.yaxis[0].title.style.fontWeight = 'bold';
            this.chartInstance.theme.w.config.xaxis.title.style.fontWeight = 'bold';

            this.chartInstance.theme.w.config.legend.markers.offsetX = -3;
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
            this.chartInstance.theme.w.config.xaxis.title.style.color = primaryText;
            this.chartInstance.theme.w.config.yaxis[0].title.style.color = primaryText;

            {{-- secondary texts --}}
            var secondaryText = this.texts[theme][1];
            this.chartInstance.theme.w.config.legend.labels.colors = secondaryText;
            this.chartInstance.theme.w.config.xaxis.labels.style.colors = secondaryText;
            this.chartInstance.theme.w.config.yaxis[0].labels.style.colors = secondaryText;
        }
    }"
    {{ $attributes }}>
</div>
