<?php

namespace App\Livewire\Admin\Role;

use App\Livewire\Forms\Admin\RoleForm;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Index extends \App\Livewire\Admin\AdminBaseComponent
{
    use \App\Traits\PageListTrait;

    /**
     * Role Update
     * @var RoleForm
     */
    public RoleForm $roleUpdate;

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
     * Open Role Form Modal
     * @param string $dialogId
     * @param mixed $role
     * @return void
     */
    public function openRoleFormModal(string $dialogId, ?Role $role = null)
    {
        $dialogId == 'dialog_role_update' ?
            $this->roleUpdate->setRole($role) :
            $this->roleUpdate->setRole();

        $this->dispatch('evt__dialog_show', id: $dialogId);
    }

    /**
     * Update Role
     * @return void
     */
    public function updateRole()
    {
        $this->authorize('update', $this->roleUpdate->role);

        $feedback = $this->feedbackGlobal();

        $this->roleUpdate->update() ?
            $feedback->success(__('messages.success.on_create_role')) :
            $feedback->error(__('messages.error.on_create_role'));

        $feedback->toLivewire($this);

        $this->dispatch('evt__dialog_close', id: 'dialog_role_update');
    }

    /**
     * Give a Permission
     * @param string $permission
     * @return void
     */
    public function givePermission(string $permission)
    {
        $this->authorize('update', $this->roleUpdate->role);

        $this->roleUpdate->role->givePermissionTo($permission);
    }

    /**
     * Revoke a Permission
     * @param string $permission
     * @return void
     */
    public function revokePermission(string $permission)
    {
        $this->authorize('update', $this->roleUpdate->role);

        $this->roleUpdate->role->revokePermissionTo($permission);
    }

    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->authorize('viewAny', Role::class);

        return $this->renderView(
            'livewire..admin.role.index',
            $this->page()->addTitle(trans_choice('words.r.role', 2))
                ->addBreadcrumb(trans_choice('words.r.role', 2), route('admin.roles.index'), true),
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
     * @return \App\Models\Role|\Illuminate\Database\Eloquent\Builder
     */
    public function modelInstance(): Model|Builder
    {
        return new \App\Models\Role();
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
                'view' => 'livewire.admin.role.includes.role-info'
            ],
            [
                'label' => 'Registrado',
                'view' => 'livewire.admin.role.includes.role-created_at'
            ],
            [
                'label' => 'Ações',
                'view' => 'livewire.admin.role.includes.role-actions'
            ]
        ];
    }
}
