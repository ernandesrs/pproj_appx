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
            'line' => \App\Support\ChartCreator::line('Gráfico de vendas')
                ->addVerticalInfo(-5, 120)
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN'])
                ->addSerieData(
                    'Vendas 2023',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                )
                ->addSerieData(
                    'Vendas 2024',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                )
                ->addSerieData(
                    'Vendas 2025',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                ),
            'area' => \App\Support\ChartCreator::area('Gráfico de vendas')
                ->addVerticalInfo(-5, 120)
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN'])
                ->addSerieData(
                    'Vendas 2023',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                )
                ->addSerieData(
                    'Vendas 2024',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                )
                ->addSerieData(
                    'Vendas 2025',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                ),
            'bar' => \App\Support\ChartCreator::bar('Gráfico de vendas')
                ->addVerticalInfo(-5, 120)
                ->addHorizontalInfo(['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN'])
                ->addSerieData(
                    'Vendas 2023',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                )
                ->addSerieData(
                    'Vendas 2024',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                ),
        ]);
    }
}
