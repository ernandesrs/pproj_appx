<?php

namespace App\Livewire\Admin;

class Profile extends \App\Livewire\Admin\AdminBaseComponent
{
    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.profile',
            $this->page()->addTitle(trans_choice('words.p.profile', 1))
                ->addBreadcrumb('Home', route('admin.overview'))
                ->addBreadcrumb(trans_choice('words.p.profile', 1), '#', true),
            [
                'profile' => \Auth::user()
            ]
        );
    }
}
