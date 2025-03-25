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
            'chart1' => \App\Support\ChartCreator::pie('Usuários')
                ->addSeriesColor([
                    \App\Enums\Chart\ChartColor::GREEN,
                    \App\Enums\Chart\ChartColor::ORANGE,
                ])
                ->addSerie('Comum', \App\Models\User::count())
                ->addSerie('Admin', \App\Models\User::whereHas('roles')->count()),
            'chart2' => \App\Support\ChartCreator::line('Line chart title', 275)
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
