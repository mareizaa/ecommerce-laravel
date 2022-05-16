<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleClient = Role::create(['name' => 'client']);

        Permission::create(['name' => 'products']);
        Permission::create(['name' => 'users']);

        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'products.create']);
        Permission::create(['name' => 'products.update']);
    }
}
