<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RolePolicy extends BasePolicy
{
    /**
     * Permissions Enum
     * @return string
     */
    public function permissionsEnum(): string
    {
        return \App\Enums\Permissions\RolePermission::class;
    }

    /**
     * Delete
     * @param \App\Models\User $user
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function delete(User $user, Model $model): bool
    {
        // Can't delete default admin roles
        if (in_array($model->name, \App\Enums\AdminRolesEnum::cases()))
            return false;

        return parent::delete($user, $model);
    }
}
