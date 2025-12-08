<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepreciationPeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('depreciation_periods')->insert([
            [
                'name' => 'Monthly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yearly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
