<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public string $icon = '',
        public string $titleTag = 'h2',
        public ?string $contentHeight = null
    ) {
    }

    /**
     * Show Header
     * @return bool
     */
    public function showHeader(): bool
    {
        return isset($this->slots['actions']) || !empty($this->title);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.card');
    }
}
