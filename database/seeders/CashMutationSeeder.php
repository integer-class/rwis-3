<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashMutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 4381; $i++) {
            $data[] = [
                'cash_mutation_code' => fake()->numerify('CM-##########'),
                'account_sender_id' => fake()->numberBetween(1, 142),
                'amount' => fake()->biasedNumberBetween(5000, 25_000),
                'account_receiver_id' => 1,
                'description' => fake()->randomElement([
                    "Iuran Sampah",
                    "Iuran Kematian",
                    "Iuran Keamanan",
                    "Iuran Kebersihan",
                    "Iuran Fasilitas",
                ]),
                'created_at' => fake()->dateTimeInInterval("-1 years", "1months"),
            ];
        }
        DB::table('cash_mutation')->insert($data);
    }
}
