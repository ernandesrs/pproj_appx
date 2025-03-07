<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire..admin.profile', [
            'profile' => \App\Models\User::first()
        ])->layout('components.layouts.admin', [
                    'title' => 'Admin - Perfil'
                ]);
    }
}
