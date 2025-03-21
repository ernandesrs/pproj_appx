<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class UserPolicy extends BasePolicy
{
    /**
     * Permissions Enum
     * @return string
     */
    public function permissionsEnum(): string
    {
        return \App\Enums\Permissions\UserPermission::class;
    }

    /**
     * Update
     * @param \App\Models\User $user
     * @param \App\Models\User $model
     * @return bool
     */
    public function update(User $user, Model $model): bool
    {
        // can't update your self
        if ($user->id == $model->id) {
            return false;
        }

        // admin can't update other admin or super
        if (
            $user->hasRole(roles: \App\Enums\AdminRolesEnum::ADMIN) &&
            ($model->hasRole(\App\Enums\AdminRolesEnum::ADMIN) ||
                $model->hasRole(\App\Enums\AdminRolesEnum::SUPER))
        ) {
            return false;
        }

        return parent::update($user, $model);
    }

    /**
     * Delete
     * @param \App\Models\User $user
     * @param \App\Models\User $model
     * @return bool
     */
    public function delete(User $user, Model $model): bool
    {
        // can't delete your self
        if ($user->id == $model->id) {
            return false;
        }

        // admin can't delete admin or super
        if (
            $user->hasRole(roles: \App\Enums\AdminRolesEnum::ADMIN) &&
            ($model->hasRole(\App\Enums\AdminRolesEnum::ADMIN) ||
                $model->hasRole(\App\Enums\AdminRolesEnum::SUPER))
        ) {
            return false;
        }

        return parent::delete($user, $model);
    }
}
