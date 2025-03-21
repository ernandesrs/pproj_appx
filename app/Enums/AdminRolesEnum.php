<?php

namespace App\Enums;

enum AdminRolesEnum: string
{
    case SUPER = 'Super';

    case ADMIN = 'Admin';

    /**
     * Label
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::SUPER => trans_choice('permissions.roles.super', 1),
            self::ADMIN => trans_choice('permissions.roles.admin', 1),
        };
    }
}
