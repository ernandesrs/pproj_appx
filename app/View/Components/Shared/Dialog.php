<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dialog extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title,
        public ?string $icon = null,
        public string $size = 'base'
    ) {
    }

    /**
     * Get Size
     * @return string
     */
    public function getSize(): string
    {
        return in_array($this->size, ['sm', 'base', 'lg', 'xl']) ? $this->size : 'base';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.dialog');
    }
}
