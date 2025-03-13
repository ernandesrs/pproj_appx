<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Update user
     * @param \App\Models\User $user
     * @param array $validated
     * @return bool
     */
    public static function update(User $user, array $validated)
    {
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        return $user->update($validated);
    }
}
