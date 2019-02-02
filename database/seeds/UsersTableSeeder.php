<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Mr.Admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@devvit.com',
            'avatar' => asset('avatars/admin_avatar.png'),
            'admin' => 1
        ]);

        App\User::create([
            'name' => 'Mr.User',
            'password' => bcrypt('user'),
            'email' => 'user@devvit.com',
            'avatar' => asset('avatars/user_avatar.png'),
        ]);
    }
}
