<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Create user
     * @param array $validated
     * @return null|\App\Models\User
     */
    public static function create(array $validated): ?User
    {
        $user = User::create($validated);
        return $user === false ? null : $user;
    }

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
