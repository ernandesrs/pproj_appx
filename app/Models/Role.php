<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    /**
     * Casts
     * @var array
     */
    protected $casts = [
        'name' => \App\Enums\Permissions\Admin\RolesEnum::class
    ];
}
