<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_types')->insert([
            [
                'property_type' => 'Residential'
            ],
            [
                'property_type' => 'Commercial'
            ],
            [
                'property_type' => 'Industrial'
            ],
            [
                'property_type' => 'PG/Hostel'
            ],
            [
                'property_type' => 'Agriculture'
            ],
        ]);
    }
}
