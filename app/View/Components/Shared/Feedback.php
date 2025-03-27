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
     * Data
     * @var array
     */
    protected array $data = [];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $message = '',
        public ?string $title = null,
        public string $type = 'default',
        public bool $fixed = true,
        public bool $unclosable = false,
    ) {
        if (!empty($this->message)) {
            $this->data = [
                'fixed' => $fixed,
                'type' => $type,
                'title' => $title,
                'message' => $message,
                'unclosable' => $unclosable
            ];
        }
    }

    /**
     * Get Feedback from session
     * @return ?array
     */
    public function getFeedback(string $id): ?array
    {
        if (!empty($this->data['message']))
            return $this->data;

        $feedback = \App\Helpers\Feedback::fromSession($id);
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
