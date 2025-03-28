<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Clickable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $text = null,
        public string $style = 'primary',
        public string $variant = 'filled',
        public ?string $icon = null,
        public ?string $prependIcon = null,
        public ?string $appendIcon = null,
        public bool $small = false,
        public bool $asLink = false,
        public bool $square = false,
        public bool $loading = false,
    ) {
    }

    /**
     * Get Style
     * @return string
     */
    public function getStyle(): string
    {
        return in_array($this->style, ['primary', 'secondary', 'success', 'info', 'danger', 'warning', 'light']) ? $this->style : 'primary';
    }

    /**
     * Get Variant
     * @return string
     */
    public function getVariant(): string
    {
        return in_array($this->variant, ['filled', 'outlined', 'flat']) ? $this->variant : 'filled';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.clickable');
    }
}
