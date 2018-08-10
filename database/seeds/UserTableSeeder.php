<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        \App\User::create([
            'username' => 'bakhshi',
            'password' => bcrypt('12589'),
            'remember_token' => str_random(10),
            'last_login' => str_random(10),
            'login' => str_random(10),
        ]);
        \App\User::create([
            'username' => 'assistant',
            'password' => bcrypt('123456789'),
            'remember_token' => str_random(10),
            'last_login' => str_random(10),
            'login' => str_random(10),
        ]);
    }
}