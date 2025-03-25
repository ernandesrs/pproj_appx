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
                ->addSerie('Comum', \App\Models\User::count())
                ->addSerie('Admin', \App\Models\User::whereHas('roles')->count()),
            'chart2' => \App\Support\ChartCreator::line('Line chart title', 275)
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR'])
                ->addSeries('Serie #1', [rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100)])
                ->addSeries('Serie #2', [rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100)])
                ->addSeries('Serie #3', [rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100)]),
        ]);
    }
}
