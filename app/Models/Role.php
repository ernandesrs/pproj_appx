<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    /**
     * Fillable
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name',
        'is_default',
        'admin_access'
    ];

    /**
     * Is Default Admin Role
     * @return bool
     */
    public function isDefaultAdminRole(): bool
    {
        return in_array($this->name, \App\Enums\AdminRolesEnum::cases());
    }

    /**
     * Get Name
     * @return string
     */
    public function getName(): string
    {
        return $this->is_default ? $this->name->label() : $this->name;
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::retrieved(function (\App\Models\Role $role) {
            if ($role->is_default) {
                $role->name = \App\Enums\AdminRolesEnum::from($role->name);
            }
        });
    }
}
