<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         *
         *
         * Permissions
         *
         *
         */
        \App\Models\Permission::permissionsEnumsClass()->map(function ($permissionEnumClass) {
            foreach ($permissionEnumClass::cases() as $permission) {
                \App\Models\Permission::create([
                    'name' => $permission->value
                ]);
            }
        });

        /**
         *
         *
         * Roles
         *
         *
         */

        $roleSuper = \App\Models\Role::create([
            'name' => \App\Enums\AdminRolesEnum::SUPER
        ]);

        $roleAdmin = \App\Models\Role::create([
            'name' => \App\Enums\AdminRolesEnum::ADMIN
        ]);

        $roleAdmin->givePermissionTo(\App\Enums\Permissions\UserPermission::VIEW_ANY);

        $super = \App\Models\User::factory()->create([
            'first_name' => 'Super',
            'last_name' => 'User',
            'username' => 'superuser',
            'gender' => \App\Enums\UserGendersEnum::MALE,
            'email' => 'super@mail.com',
        ]);

        $admin = \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'adminuser',
            'gender' => \App\Enums\UserGendersEnum::MALE,
            'email' => 'admin@mail.com',
        ]);

        $super->assignRole($roleSuper);
        $admin->assignRole($roleAdmin);

        \App\Models\User::factory(100)->create();
    }
}
