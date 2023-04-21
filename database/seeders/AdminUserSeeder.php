<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
date_default_timezone_set("Asia/Kolkata");

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            [
                'role_id' => '1',
                'name' => 'Hackberry Softech',
                'email' => 'info@hackberrysoftech.com',
                'contact' => 7948998877,
                'admin_password' => 123,
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
