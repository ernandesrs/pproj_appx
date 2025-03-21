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
    public static function update(User $user, array $validated): bool
    {
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        return $user->update($validated);
    }

    /**
     * Delete user
     * @param \App\Models\User $user
     * @return ?bool
     */
    public static function delete(User $user): ?bool
    {
        return $user->delete();
    }
}
