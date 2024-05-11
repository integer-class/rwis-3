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
        $data = [
            [
                'household_id' => 1,
                'name_account' => 'Azhar RT 006',
                'number_account' => '1234567890123456',
                'balance' => 1_000_000,
            ],
            [
                'household_id' => 2,
                'name_account' => 'Joko RT 006',
                'number_account' => '1234567890123457',
                'balance' => 2_000_000,
            ],
            [
                'household_id' => 3,
                'name_account' => 'Rudi RT 006',
                'number_account' => '1234567890123458',
                'balance' => 3_000_000,
            ],
            [
                'household_id' => 3,
                'name_account' => 'Kas Sampah',
                'number_account' => '1234567890123459',
                'balance' => 4_000_000,
            ],
            [
                'household_id' => 3,
                'name_account' => 'Kas Kematian',
                'number_account' => '1234567890123460',
                'balance' => 4_000_000,
            ],
        ];

        DB::table('account')->insert($data);
        // DB::table('account')->truncate();
    }
}
