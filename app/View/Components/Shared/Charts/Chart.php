<?php

namespace App\View\Components\Shared\Charts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public \App\Support\Chart\Chart $chart
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.charts.chart');
    }
}
