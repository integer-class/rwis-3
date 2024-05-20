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
        $data = [
            [
                'cash_mutation_code' => 'CM-0000000001',
                'account_sender_id' => 4,
                'amount' => 10_000,
                'account_receiver_id' => 1,
                'description' => 'Pembayaran Iuran Sampah Bulanan',
                'created_at' => now(),
            ],
            [
                'cash_mutation_code' => 'CM-0000000002',
                'account_sender_id' => 5,
                'amount' => 10_000,
                'account_receiver_id' => 2,
                'description' => 'Pembayaran Iuran Kematian Bulanan',
                'created_at' => now(),
            ],
            [
                'cash_mutation_code' => 'CM-0000000003',
                'account_sender_id' => 4,
                'amount' => 10_000,
                'account_receiver_id' => 3,
                'description' => 'Pembayaran Iuran Sampah Bulanan',
                'created_at' => now(),
            ],
        ];

        DB::table('cash_mutation')->insert($data);
        // DB::table('cash_mutation')->truncate();
    }
}
