<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $formLogin;

    /**
     * Mount
     * @return void
     */
    public function mount()
    {
        $this->formLogin->start();
    }

    /**
     * Render
     */
    public function render()
    {
        return view('livewire..auth.login')
            ->layout('components.layouts.app', [
                'title' => 'Login'
            ]);
    }

    /**
     * Attempt
     * @return void
     */
    public function attempt()
    {
        $this->formLogin->attempt() ?
            $this->redirect(route('auth.login')) :
            $this->redirect(route('admin.overview'));
    }
}
