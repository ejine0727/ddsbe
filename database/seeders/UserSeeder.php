<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
            'gender' => 'Male',
        ]);

        User::create([
            'username' => 'user1',
            'password' => Hash::make('password456'),
            'gender' => 'Female',
        ]);
    }
}

