<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 *
 * Summary of Feedback
 *
 * Listen this events
 * - evt__feedback_add
 *
 * Dispatch example:
 * - $dispatch('evt_name', {feedback: {}})
 *
 * Dispatch this events
 *
 */
class Feedback extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id
    ) {
    }

    /**
     * Get Feedback from session
     * @return ?array
     */
    public function getFeedback(): ?array
    {
        $feedback = \App\Helpers\Feedback::fromSession('admin');
        return $feedback ? $feedback->toArray() : null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.feedback');
    }
}
