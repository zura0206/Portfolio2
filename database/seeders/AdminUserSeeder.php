<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'mb@gmail.com',
            'password' => Hash::make('mb123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'ZuraAdmin',
            'email' => 'zura@gmail.com',
            'password' => Hash::make('zura'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'role' => 'user'
        ]);
    }
}
