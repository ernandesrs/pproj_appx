<?php

namespace App\Livewire\Forms\Admin;

use App\Models\Role;
use App\Rules\RoleRules;
use App\Services\RoleService;
use Livewire\Attributes\Locked;
use Livewire\Form;

class RoleForm extends Form
{
    /**
     * Role
     * @var ?Role
     */
    #[Locked]
    public ?Role $role = null;

    /**
     * Name
     * @var string
     */
    public string $name;

    /**
     * Guard
     * @var string
     */
    public string $guard_name;

    /**
     * Admin access
     * @var bool
     */
    public bool $admin_access;

    /**
     * Set Role
     * @param null|Role $role
     * @return void
     */
    public function setRole(?Role $role = null)
    {
        $this->role = $role;

        $this->resetErrorBag();

        $this->fill([
            'name' => $this->role ? $this->role->getName() : null,
            'guard_name' => $this->role ? $this->role->guard_name : null,
            'admin_access' => $this->role ? $this->role->admin_access : false,
        ]);
    }

    /**
     * Update
     * @return bool
     */
    public function update(): bool
    {
        return RoleService::update($this->role, $this->validate(RoleRules::update($this->role)));
    }
}
