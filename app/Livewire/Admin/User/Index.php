<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserForm;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Index extends \App\Livewire\Admin\AdminBaseComponent
{
    use \App\Traits\PageListTrait;

    /**
     * Form User Create
     * @var UserForm
     */
    public UserForm $formUserCreate;

    /**
     * Form User Update
     * @var UserForm
     */
    public UserForm $formUserUpdate;

    /**
     * Mount
     * @return void
     */
    public function mount()
    {
    }

    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.user.index',
            $this->page()->addTitle(trans_choice('words.u.user', 2))
                ->addBreadcrumb(trans_choice('words.u.user', 2), route('admin.users.index'), true),
            [
                'items' => $this->getItems()
            ]
        );
    }

    /**
     * Open Create User Modal
     * @return void
     */
    public function openUserFormModal(string $modalId, ?\App\Models\User $user = null)
    {
        if ($modalId == 'dialog_create_show') {
            $this->formUserCreate->setUser();
        } elseif ($modalId = 'dialog_update_show') {
            $this->formUserUpdate->setUser($user);
        }

        $this->dispatch('evt__dialog_show', id: $modalId);
    }

    /**
     * Save User
     * @return void
     */
    public function saveUser()
    {
        $feedback = $this->feedbackGlobal();

        $created = $this->formUserCreate->create();
        if ($created) {
            $feedback->success(__('messages.success.on_create_user'));
            $this->dispatch('evt__dialog_close', id: 'dialog_create_show');
        } else {
            $feedback->error(__('messages.error.on_create_user'));
        }

        $feedback->toLivewire($this);
    }

    /**
     * Update User
     * @return void
     */
    public function updateUser()
    {
        $feedback = $this->feedbackGlobal();

        $updated = $this->formUserUpdate->update();
        if ($updated) {
            $feedback->success(__('messages.success.on_update_user'));
            $this->dispatch('evt__dialog_close', id: 'dialog_update_show');
        } else {
            $feedback->error(__('messages.error.on_update_user'));
        }

        $feedback->toLivewire($this);
    }

    /**
     * Searchable Fields
     * @return array
     */
    public function searchableFields(): array
    {
        return ['first_name', 'last_name', 'username'];
    }

    /**
     * Model Instance
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    public function modelInstance(): Model|Builder
    {
        return new \App\Models\User();
    }

    /**
     * Columns
     * @return array
     */
    public function columns(): array
    {
        return [
            [
                'label' => 'ID',
                'key' => 'id'
            ],
            [
                'label' => 'Nome',
                'view' => 'livewire.admin.user.includes.user-name'
            ],
            [
                'label' => 'Usuário',
                'key' => 'username'
            ],
            [
                'label' => 'E-mail',
                'key' => 'email'
            ],
            [
                'label' => 'Ações',
                'view' => 'livewire.admin.user.includes.user-actions',
            ]
        ];
    }
}
