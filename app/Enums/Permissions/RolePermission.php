<?php

namespace App\Enums\Permissions;

enum RolePermission: string
{
    case VIEW_ANY = 'view_any_role';

    case VIEW = 'view_role';

    case CREATE = 'create_role';

    case UPDATE = 'update_role';

    case DELETE = 'delete_role';

    case RESTORE = 'restore_role';

    case FORCE_DELETE = 'force_delete_role';

    /**
     * Label
     * @return string
     */
    public static function label(): string
    {
        return __('permissions.permissions_over_roles');
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
