<?php

namespace App\Rules;

use App\Contracts\RulesContract;

class RoleRules implements RulesContract
{
    /**
     * Create
     * @return array
     */
    public static function create(): array
    {
        return [
            'name' => ['required', 'unique:roles,name'],
            'admin_access' => ['required', 'boolean']
        ];
    }

    /**
     * Update
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return array
     */
    public static function update(\Illuminate\Database\Eloquent\Model $model): array
    {
        $rules = static::create();

        $rules['name'] = ['required', 'unique:roles,name,' . $model->id];

        return $rules;
    }
}
