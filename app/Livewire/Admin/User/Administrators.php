<?php

namespace App\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Administrators extends \App\Livewire\Admin\AdminBaseComponent
{
    use \App\Traits\PageListTrait;

    public string $searchUser = '';

    public mixed $searchResults = null;

    public ?User $userToPromote = null;

    /**
     * Mount
     * @return void
     */
    public function mount()
    {
        $this->defaultBetweenDatesFields = [];
        $this->defaultSortableFields = [];
    }

    /**
     * Open User Promotion Dialog
     * @return void
     */
    public function openUserPromotionDialog(): void
    {
        $this->searchUser = '';
        $this->searchResults = null;
        $this->userToPromote = null;
        $this->dispatch('evt__dialog_show', id: 'dialog_new_admin');
    }

    public function searchByUser(): void
    {
        $validated = $this->validate(['searchUser' => ['nullable', 'string']]);
        if (!empty($validated['searchUser'])) {
            $this->searchResults = User::whereRaw('MATCH(first_name,last_name,username) AGAINST(? IN BOOLEAN MODE)', [$validated['searchUser']])->limit(5)->get();
        } else {
            $this->searchResults = null;
        }
    }

    public function chooseUserToPromote(User $user)
    {
        $this->authorize('update', $user);
        $this->userToPromote = $user;
    }

    public function assingRole(Role $role)
    {
        $this->authorize('update', $this->userToPromote);
        $this->userToPromote->assignRole($role);
    }

    public function removeRole(Role $role)
    {
        $this->authorize('update', $this->userToPromote);
        $this->userToPromote->removeRole($role);
    }

    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.user.administrators',
            $this->page()->addTitle(trans_choice('words.a.admin', 2))
                ->addBreadcrumb(trans_choice('words.a.admin', 2), route('admin.users.administrators'), true),
            [
                'items' => $this->getItems()
            ]
        );
    }

    /**
     * Searchable Fields
     * @return array
     */
    public function searchableFields(): array
    {
        return [];
    }

    /**
     * Model Instance
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    public function modelInstance(): Model|Builder
    {
        return (new \App\Models\User())->whereHas('roles', function ($query) {
            return $query->whereIn('name', \App\Enums\AdminRolesEnum::cases());
        });
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
                'label' => trans_choice('words.n.name', 1),
                'view' => 'livewire.admin.user.includes.user-name'
            ],
            [
                'label' => trans_choice('words.r.role', 2),
                'view' => 'livewire.admin.user.includes.admin-roles'
            ],
            [
                'label' => trans_choice('words.e.email', 1),
                'key' => 'email'
            ],
        ];
    }
}
