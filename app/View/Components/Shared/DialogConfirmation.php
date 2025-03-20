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
 * Dispatch this events:
 * - evt__confirmation_confirmed_dialog_id
 * - evt__confirmation_confirmed
 *
 * - evt__confirmation_canceled_dialog_id
 * - evt__confirmation_canceled
 *
 */
class DialogConfirmation extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title = '',
        public string $message = '',
        public string $confirmationText = '',
        public string $cancelText = '',
    ) {
        $this->title = empty($title) ? trans_choice('words.c.confirm', 1) . '?' : $title;
        $this->message = empty($message) ? __('messages.alerts.confirmation') : $message;
        $this->confirmationText = empty($confirmationText) ? trans_choice('words.c.confirm', 1) : $confirmationText;
        $this->cancelText = empty($cancelText) ? trans_choice('words.c.cancel', 1) : $cancelText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.dialog-confirmation');
    }
}
