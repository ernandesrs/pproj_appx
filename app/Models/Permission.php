<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    /**
     * Casts
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Permissions Enums Class
     * @return \Illuminate\Support\Collection
     */
    public static function permissionsEnumsClass(): \Illuminate\Support\Collection
    {
        return \Illuminate\Support\Collection::make([])
            ->push(\App\Enums\Permissions\Admin\UserPermission::class);
    }
}
