<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;

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
     * User to Delete
     * @var ?User
     */
    #[Locked]
    public ?User $userDelete = null;

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
    public function openUserFormModal(string $modalId, ?User $user = null)
    {
        if ($modalId == 'dialog_create_show') {
            $this->formUserCreate->setUser();
        } elseif ($modalId = 'dialog_update_show') {
            $this->formUserUpdate->setUser($user);
        }

        $this->dispatch('evt__dialog_show', id: $modalId);
    }

    /**
     * Delete User Confirmation
     * @param \App\Models\User $user
     * @return void
     */
    public function deleteUserConfirmation(User $user)
    {
        $this->userDelete = $user;
        $this->dispatch('evt__dialog_show', id: 'dialog_user_delete_show');
    }

    /**
     * User Delete Confirmed
     * @return void
     */
    public function userDeleteConfirmed()
    {
        $feedback = $this->feedbackGlobal();
        if (\Auth::user()->id != $this->userDelete?->id) {

            \App\Services\UserService::delete($this->userDelete) ?
                $feedback->success(__('messages.success.on_delete_user')) :
                $feedback->error(__('messages.error.on_delete_user'));
        } else {
            $feedback->error(__('messages.error.on_delete_user'));
        }

        $feedback->toLivewire($this);
        $this->dispatch('evt__dialog_close', id: 'dialog_user_delete_show');
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
