<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\UserForm;

class Profile extends \App\Livewire\Admin\AdminBaseComponent
{
    /**
     * Profile
     * @var UserForm
     */
    public UserForm $form;

    /**
     * Mount
     * @return void
     */
    public function mount()
    {
        $this->form->setUser(\Auth::user());
    }

    /**
     * Update
     * @return void
     */
    public function update(): void
    {
        $feedback = $this->feedbackGlobal();

        $this->form->update() ?
            $feedback->success('Perfil atualizado.')->toLivewire($this) :
            $feedback->error('Erro inesperado ao atualizar.')->toLivewire($this);
    }

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
                ->addBreadcrumb(trans_choice('words.p.profile', 1), '#', true)
        );
    }
}
