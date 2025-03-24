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
                ->addVerticalInfo(-5, 120, 'Vendas anuais')
                ->addHorizontalInfo(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'], 'Vendas mensais')
                ->addSerieData(
                    'Vendas 2023',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                )
                ->addSerieData(
                    'Vendas 2024',
                    [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)]
                ),
            'area' => \App\Support\ChartCreator::area('Gráfico de vendas')
                ->addVerticalInfo(-5, 120, 'Vendas anuais')
                ->addHorizontalInfo(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'], 'Vendas mensais')
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
