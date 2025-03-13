<?php

namespace App\Rules;
use App\Contracts\RulesContract;
use Illuminate\Validation\Rule;

class UserRules implements RulesContract
{
    /**
     * Create
     * @return array
     */
    public static function create(): array
    {
        return [
            'first_name' => ['required', 'max:25'],
            'last_name' => ['required', 'max:50'],
            'username' => ['required', 'max:25', 'unique:users,username'],
            'gender' => [Rule::enum(\App\Enums\UserGendersEnum::class)],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
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

        $rules['username'] = ['required', 'unique:users,username,' . $model->id];
        $rules['email'] = ['required', 'unique:users,email,' . $model->id];
        $rules['password'] = ['nullable', 'confirmed'];

        return $rules;
    }
}
