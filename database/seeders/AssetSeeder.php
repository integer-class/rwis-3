<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'household_id' => 1,
                'name' => 'Motor',
            ],
            [
                'household_id' => 1,
                'name' => 'Mobil',
            ],
            [
                'household_id' => 2,
                'name' => 'Motor',
            ],
            [
                'household_id' => 2,
                'name' => 'Mobil',
            ],
            [
                'household_id' => 3,
                'name' => 'Motor',
            ],
            [
                'household_id' => 3,
                'name' => 'Mobil',
            ],
        ];

        DB::table('asset')->insert($data);
        // DB::table('asset')->truncate();
    }
}
