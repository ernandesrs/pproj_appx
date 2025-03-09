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
            [
                'pageTitle' => 'Perfil',
                'profile' => \Auth::user()
            ]
        );
    }
}
