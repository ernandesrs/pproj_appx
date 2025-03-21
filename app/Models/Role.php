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
        'name' => \App\Enums\AdminRolesEnum::class
    ];

    /**
     * Is Default Admin Role
     * @return bool
     */
    public function isDefaultAdminRole(): bool
    {
        return in_array($this->name, \App\Enums\AdminRolesEnum::cases());
    }
}
