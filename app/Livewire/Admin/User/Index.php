<?php

namespace App\Livewire\Admin\User;

class Index extends \App\Livewire\Admin\AdminBaseComponent
{
    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.user.index',
            $this->page()->addTitle(trans_choice('words.u.user', 2))
                ->addBreadcrumb(trans_choice('words.o.overview', 1), route('admin.overview'))
                ->addBreadcrumb(trans_choice('words.u.user', 2), route('admin.users.index'), true),
            [
                'users' => \App\Models\User::limit(20)->get()
            ]
        );
    }
}
