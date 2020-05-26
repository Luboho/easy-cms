<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'Admin',
            'username'       => 'Head Admin',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt('password'),
            'role'           => 'head_admin',
        ]);
    }
}
