<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 *
 * Summary of Dialog
 *
 * Listen this events
 * - evt__dialog_show
 * - evt__dialog_close
 *
 * Dispatch example:
 * - $dispatch('evt_name', {id: 'dialog_id'})
 *
 * Dispatch this events
 * - evt__dialog_showed
 * - evt__dialog_closed
 *
 */
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
