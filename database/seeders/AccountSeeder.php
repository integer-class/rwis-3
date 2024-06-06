<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 142; $i++) {
            $data[] = [
                'household_id' => $i + 1,
                'name_account' => fake('id_ID')->name,
                'number_account' => fake()->numerify('################'),
                'balance' => fake()->numberBetween(1_000_000, 10_000_000),
            ];
        }
        DB::table('account')->insert($data);
    }
}
