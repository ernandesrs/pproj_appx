<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class OverviewCharts extends Component
{
    public function updateChartData(): void
    {
    }

    public function render()
    {
        return view('livewire..admin.overview-charts', [
            'chart1' => \App\Support\ChartCreator::pie('Pie chart')
                ->addSeriesColor([
                    \App\Enums\Chart\ChartColor::GREEN,
                    \App\Enums\Chart\ChartColor::ORANGE,
                    \App\Enums\Chart\ChartColor::BLUE,
                    \App\Enums\Chart\ChartColor::RED,
                ])
                ->addSerie('Serie #1', 8)
                ->addSerie('Serie #2', 25)
                ->addSerie('Serie #3', 30)
                ->addSerie('Serie #4', 10),
            'chart2' => \App\Support\ChartCreator::line('Line chart', 275)
                ->addSeriesColor([
                    \App\Enums\Chart\ChartColor::RED,
                    \App\Enums\Chart\ChartColor::BLUE,
                    \App\Enums\Chart\ChartColor::GREEN,
                ])
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR'])
                ->addSeries('Serie #1', [10, 5, 12, 15])
                ->addSeries('Serie #2', [12, 10, 14, 19])
                ->addSeries('Serie #3', [2, 5, 2, 4]),
        ]);
    }
}
