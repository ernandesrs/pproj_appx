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
            'chart1' => \App\Support\ChartCreator::line('Line chart title', 275)
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR'])
                ->addSeries('Serie #1', [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)])
                ->addSeries('Serie #2', [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]),
            'chart2' => \App\Support\ChartCreator::area('Area chart title', 275)
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR'])
                ->addSeries('Serie #1', [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)])
                ->addSeries('Serie #2', [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]),
        ]);
    }
}
