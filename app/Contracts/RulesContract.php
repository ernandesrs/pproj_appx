<?php

namespace App\Contracts;

interface RulesContract
{
    /**
     * Rules to create
     * @return array
     */
    public static function create(): array;

    /**
     * Rules to update
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return array
     */
    public static function update(\Illuminate\Database\Eloquent\Model $model): array;
}
