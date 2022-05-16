<?php

namespace Database\Seeders;

use Database\Seeders\users\UsersSeeder;
use Database\Seeders\products\ProductsSeeder;
use Database\Seeders\products\ImagesSeeder;
use Database\Seeders\roles\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ImagesSeeder::class);
    }
}
