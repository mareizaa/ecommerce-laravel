<?php

namespace Database\Seeders\users;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'status' => '1',
                'email_verified_at' => now(),
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Usuario',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'client',
                'status' => '0',
                'email_verified_at' => now(),
            ]
        );
    }
}
