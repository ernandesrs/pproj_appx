<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
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
}
