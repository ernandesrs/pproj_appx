<?php

namespace App\View\Components\Shared\Tabs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $tabs = [
            [
                'name' => 'Tab #1',
                'icon' => 'arrow-right',
            ],
            [
                'name' => 'Tab #2',
                'icon' => 'arrow-right',
            ]
        ],
        public string $selected = 'Tab #2',
        public bool $center = false,
        public bool $end = false,
        public bool $onlyIcon = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.tabs.tabs');
    }
}
