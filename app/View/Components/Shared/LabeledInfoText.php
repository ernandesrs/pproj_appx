<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LabeledInfoText extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $text,
        public ?string $tooltipText = null,
        public string $tooltipLocation = 'left',

        public bool $inline = false,
    ) {
    }

    /**
     * Get Tooltip Localtion
     * @return string
     */
    public function getTooltipLocaltion(): string
    {
        return in_array($this->tooltipLocation, ['left', 'right']) ? $this->tooltipLocation : 'left';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.labeled-info-text');
    }
}
