<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Feedback extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id
    ) {
        \App\Helpers\Feedback::to('admin')
            ->success('Message text lorem title dolorem sit inpsum', 'Title')
            ->fixed()->toSession();
    }

    /**
     * Get Feedback from session
     * @return array
     */
    public function getFeedback(): array
    {
        return \App\Helpers\Feedback::fromSession('admin')->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.feedback');
    }
}
