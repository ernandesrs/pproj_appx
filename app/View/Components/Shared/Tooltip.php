<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tooltip extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $location = 'left'
    ) {
    }

    /**
     * Get Location
     * @return string
     */
    public function getLocation(): string
    {
        return in_array($this->location, ['left', 'right']) ? $this->location : 'left';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.tooltip');
    }
}
