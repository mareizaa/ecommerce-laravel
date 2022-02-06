<?php

namespace Database\Seeders;

use Database\Seeders\users\UsersSeeder;
use Database\Seeders\products\ProductsSeeder;
use Database\Seeders\products\ImagesSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ImagesSeeder::class);
    }
}
