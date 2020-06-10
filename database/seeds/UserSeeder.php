<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'is_user' => false
       ]);

       User::create([
             'name' => 'user',
             'email' => 'user@gmail.com',
             'password' => Hash::make('user'),
             'is_admin' => false,
             'is_user' => true
        ]);
    }
}
