<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('client_types')->insert([
            [
                'client_type' => 'Owner'
            ],
            [
                'client_type' => 'Buyer'
            ],
            [
                'client_type' => 'Broker'
            ],
        ]);
    }
}
