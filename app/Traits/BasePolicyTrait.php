<?php

namespace App\Traits;

use App\Models\User;

trait BasePolicyTrait
{
    /**
     * Permissions Enum Class
     * @return string
     */
    abstract public static function permissionsEnum(): string;

    /**
     * View Any
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        if ($this->isSuperUser($user))
            return true;

        return $user->hasPermissionTo(self::permissionsEnum()::VIEW_ANY);
    }

    /**
     * View
     * @param \App\Models\User $user
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function view(User $user, \Illuminate\Database\Eloquent\Model $model): bool
    {
        if ($this->isSuperUser($user))
            return true;

        return $user->hasPermissionTo(self::permissionsEnum()::VIEW);
    }

    /**
     * Create
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        if ($this->isSuperUser($user))
            return true;

        return $user->hasPermissionTo(self::permissionsEnum()::CREATE);
    }

    /**
     * Update
     * @param \App\Models\User $user
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function update(User $user, \Illuminate\Database\Eloquent\Model $model): bool
    {
        if ($this->isSuperUser($user))
            return true;

        return $user->hasPermissionTo(self::permissionsEnum()::UPDATE);
    }

    /**
     * Delete
     * @param \App\Models\User $user
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function delete(User $user, \Illuminate\Database\Eloquent\Model $model): bool
    {
        if ($this->isSuperUser($user))
            return true;

        return $user->hasPermissionTo(self::permissionsEnum()::DELETE);
    }

    /**
     * Restore
     * @param \App\Models\User $user
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function restore(User $user, \Illuminate\Database\Eloquent\Model $model): bool
    {
        if ($this->isSuperUser($user))
            return true;

        return $user->hasPermissionTo(self::permissionsEnum()::RESTORE);
    }

    /**
     * Force Delete
     * @param \App\Models\User $user
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function forceDelete(User $user, \Illuminate\Database\Eloquent\Model $model): bool
    {
        if ($this->isSuperUser($user))
            return true;

        return $user->hasPermissionTo(self::permissionsEnum()::FORCE_DELETE);
    }

    /**
     * Is Super User
     * @param \App\Models\User $user
     * @return bool
     */
    protected function isSuperUser(User $user): bool
    {
        return $user->hasRole(\App\Enums\Permissions\Admin\RolesEnum::SUPER);
    }
}
