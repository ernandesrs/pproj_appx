<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public ?string $icon = null,
        public string $tag = 'h1',
        public ?string $customSize = null
    ) {
    }

    /**
     * Get Tag
     * @return string
     */
    public function getTag(): string
    {
        return in_array($this->tag, ['h1', 'h2', 'h3', 'h4', 'h5']) ? $this->tag : 'h1';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.heading');
    }
}
