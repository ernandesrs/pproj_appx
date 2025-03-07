<?php

namespace App\View\Components\Shared\Panel\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $href,
        public string $text,
        public string $icon,
        public bool $active = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.panel.sidebar.menu-item');
    }
}
