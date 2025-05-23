<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            ['key' => 'site_name', 'value' => 'Area71 Academy'],
            ['key' => 'site_email', 'value' => 'admin@area71.com'],
            ['key' => 'site_phone', 'value' => '123-456-7890'],
        ]);
    }
}
