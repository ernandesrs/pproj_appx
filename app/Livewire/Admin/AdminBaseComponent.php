<?php

namespace App\Livewire\Admin;

class AdminBaseComponent extends \App\Livewire\BaseComponent
{
    /**
     * Layout
     * @return string
     */
    public function layout(): string
    {
        return 'components.layouts.admin';
    }

    /**
     * Prepend Title
     * @return string
     */
    public function prependTitle(): string
    {
        return 'Administração';
    }

    /**
     * Feedback Global
     * @return \App\Helpers\Feedback
     */
    public function feedbackGlobal(): \App\Helpers\Feedback
    {
        return \App\Helpers\Feedback::to('admin_global');
    }
}
