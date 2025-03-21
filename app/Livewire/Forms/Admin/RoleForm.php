<?php

namespace App\Livewire\Forms\Admin;

use App\Models\Role;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
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
    public string|\App\Enums\AdminRolesEnum $name;

    /**
     * Guard
     * @var string
     */
    public string $guard_name;

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
            'name' => $this->role ? $this->role->name : null,
            'guard_name' => $this->role ? $this->role->guard_name : null
        ]);
    }
}
