<?php

namespace App\Enums\Permissions;

enum UserPermission: string
{
    case VIEW_ANY = 'view_any_user';

    case VIEW = 'view_user';

    case CREATE = 'create_user';

    case UPDATE = 'update_user';

    case DELETE = 'delete_user';

    case RESTORE = 'restore_user';

    case FORCE_DELETE = 'force_delete_user';

    /**
     * Label
     * @return string
     */
    public function label(): string
    {
        return __('permissions.permissions_over_users');
    }

    /**
     * Label
     * @return string
     */
    public function permissionLabel(): string
    {
        return match ($this) {
            self::VIEW_ANY => __('permissions.view_any'),
            self::VIEW => __('permissions.view'),
            self::CREATE => __('permissions.create'),
            self::UPDATE => __('permissions.update'),
            self::DELETE => __('permissions.delete'),
            self::RESTORE => __('permissions.restore'),
            self::FORCE_DELETE => __('permissions.force_delete'),
        };
    }
}
