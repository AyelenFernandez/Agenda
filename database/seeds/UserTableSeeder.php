<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder

{

    public function run()

    {

        \App\User::create([

            'name' => 'Invitado',
            'email' => 'guest@guest.com',
            'password' => bcrypt('guest'),
            'role' => 'guest'
        ]);

        \App\User::create([

            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'role' => 'user'
        ]);

        \App\User::create([

            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
    }
}