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
        $data = [
            [
                'number_kk' => '1234567890123456',
                'full_address' => 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
                'area' => 100,
                'is_archived' => false,
            ],
            [
                'number_kk' => '1234567890123457',
                'full_address' => 'Jl. Soekarno Hatta No.10, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
                'area' => 200,
                'is_archived' => false,
            ],
            [
                'number_kk' => '1234567890123458',
                'full_address' => 'Jl. Soekarno Hatta No.11, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
                'area' => 300,
                'is_archived' => false,
            ],
        ];

        DB::table('household')->insert($data);
        // DB::table('household')->truncate();
    }
}
