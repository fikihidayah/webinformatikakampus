<?php

namespace Database\Seeders;

use \App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Administrator',
            'email' => 'admin@uis.com',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]);

        User::create([
            'name'  => 'Fiki',
            'email' => 'fiki@uis.com',
            'password' => bcrypt('users'),
            'role_id' => 2
        ]);
    }
}
