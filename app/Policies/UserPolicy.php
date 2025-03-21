<?php

namespace App\Policies;

use App\Traits\BasePolicyTrait;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use BasePolicyTrait;

    /**
     * Permissions Enum
     * @return string
     */
    public static function permissionsEnum(): string
    {
        return \App\Enums\Permissions\Admin\UserPermission::class;
    }
}
