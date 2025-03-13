<?php

namespace App\Livewire\Admin;

use App\Support\PageConfigurator;

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
        return config('app.name') . ' ADMIN';
    }

    /**
     * Feedback Global
     * @return \App\Helpers\Feedback
     */
    public function feedbackGlobal(): \App\Helpers\Feedback
    {
        return \App\Helpers\Feedback::to('admin_global');
    }

    /**
     * Page
     * @return PageConfigurator
     */
    public function page(): PageConfigurator
    {
        return parent::page()->home('admin.overview');
    }
}
