<?php

namespace Database\Seeders\roles;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $indexProducts = Permission::create(['name' => 'products']);
        $indexUsers = Permission::create(['name' => 'users']);

        $createUsers = Permission::create(['name' => 'users.create']);
        $editUsers =Permission::create(['name' => 'users.edit']);
        $createProducts = Permission::create(['name' => 'products.create']);
        $editProducts = Permission::create(['name' => 'products.edit']);
        $exportProducts =Permission::create(['name' => 'products.export']);

        Role::create(['name' => 'admin'])->syncPermissions([$indexProducts, $indexUsers, $createUsers, $editUsers, $createProducts, $editProducts, $exportProducts]);
        Role::create(['name' => 'client']);
    }
}
