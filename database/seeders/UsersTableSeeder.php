<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admin@area71.com')->exists()) {  // ✅ Check if user exists
            User::create([
                'name' => 'Admin',
                'email' => 'admin@area71.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }
    }
}
