<?php

namespace App\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;

class Administrators extends \App\Livewire\Admin\AdminBaseComponent
{
    use \App\Traits\PageListTrait;

    /**
     * Search User
     * @var string
     */
    public string $searchUser = '';

    /**
     * Search Results
     * @var mixed
     */
    public mixed $searchResults = null;

    /**
     * User To Promote
     * @var ?User
     */
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
        $this->dispatch('evt__dialog_show', id: 'dialog_new_admin');
    }

    /**
     * Closed User Promotion Dialog: called when promotion dialog is closed
     * @return void
     */
    #[On('evt__dialog_closed_dialog_new_admin')]
    public function closedUserPromotionDialog(): void
    {
        $this->searchUser = '';
        $this->searchResults = null;
        $this->userToPromote = null;
    }

    /**
     * Search By User
     * This method apply the search
     * @return void
     */
    public function searchByUser(): void
    {
        $validated = $this->validate(['searchUser' => ['nullable', 'string']]);
        if (!empty($validated['searchUser'])) {
            $this->searchResults = User::whereRaw('MATCH(first_name,last_name,username) AGAINST(? IN BOOLEAN MODE)', [$validated['searchUser']])->limit(5)->get();
        } else {
            $this->searchResults = null;
        }
    }

    /**
     * Choose User To Promote
     * @param \App\Models\User $user
     * @param bool $manage
     * @return void
     */
    public function chooseUserToPromote(User $user, bool $manage = false)
    {
        $this->authorize('update', $user);
        $this->userToPromote = $user;

        if ($manage) {
            $this->dispatch('evt__dialog_show', id: 'dialog_new_admin');
        }
    }

    /**
     * Assing Role
     * @param \App\Models\Role $role
     * @return void
     */
    public function assingRole(Role $role)
    {
        $this->authorize('update', $this->userToPromote);
        $this->userToPromote->assignRole($role);
    }

    /**
     * Remove Role
     * @param \App\Models\Role $role
     * @return void
     */
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
            [
                'label' => trans_choice('words.a.action', 2),
                'view' => 'livewire.admin.user.includes.admin-actions'
            ],
        ];
    }
}
