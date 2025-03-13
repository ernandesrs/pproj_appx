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
            $feedback->success(__('messages.success.on_update_profile'))->toLivewire($this) :
            $feedback->error(__('messages.error.on_update_profile'))->toLivewire($this);
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
                ->addBreadcrumb(trans_choice('words.p.profile', 1), '#', true)
        );
    }
}
