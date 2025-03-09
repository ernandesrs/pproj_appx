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
            [
                'pageTitle' => 'Usuários',
                'users' => \App\Models\User::limit(20)->get()
            ]
        );
    }
}
