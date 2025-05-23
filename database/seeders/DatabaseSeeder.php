<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            CoursesTableSeeder::class,
            OrdersTableSeeder::class,
            SettingsTableSeeder::class, 
        ]);
    }
}