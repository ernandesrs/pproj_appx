<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    /**
     * Create role
     * @param array $validated
     * @return ?Role
     */
    public static function create(array $validated): ?Role
    {
        $role = Role::create($validated);
        return $role == false ? null : $role;
    }

    /**
     * Update role
     * @param \App\Models\Role $role
     * @param array $validated
     * @return bool
     */
    public static function update(Role $role, array $validated): bool
    {
        return $role->update($validated);
    }

    /**
     * Delete role
     * @param \App\Models\Role $role
     * @return bool
     */
    public static function delete(Role $role): bool
    {
        if ($role->users()->count())
            return false;

        return $role->delete();
    }
}
