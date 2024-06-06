<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HouseholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 142; $i++) {
            $data[] = [
                'number_kk' => fake('id_ID')->nik(),
                'address' => fake('id_ID')->address(),
                'rt' => fake('id_ID')->randomNumber(3),
                'rw' => fake('id_ID')->randomNumber(3),
                'sub_district' => fake('id_ID')->city(),
                'district' => fake('id_ID')->city(),
                'city' => fake('id_ID')->city(),
                'province' => fake('id_ID')->state(),
                'postal_code' => fake('id_ID')->postcode(),
                'area' => fake('id_ID')->randomNumber(3),
                'is_archived' => false,
            ];
        }
        DB::table('household')->insert($data);
    }
}
