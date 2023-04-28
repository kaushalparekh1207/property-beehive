<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NonAgriculturePropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('non_agriculture_property_types')->insert([
            [
                'na_property_type' => 'Resedential',
            ],
            [
                'na_property_type' => 'Commercial',
            ],
            [
                'na_property_type' => 'Industrial',
            ],
            [
                'na_property_type' => 'Multi-Purpose',
            ],
        ]);
    }
}
