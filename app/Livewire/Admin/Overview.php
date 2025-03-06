<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Overview extends Component
{
    public function render()
    {
        return view('livewire..admin.overview')
            ->layout('components.layouts.admin', [
                'title' => 'Admin - Overview'
            ]);
    }
}
