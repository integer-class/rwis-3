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
                'cash_mutation_code' => 'CMDEB-0000000001',
                'account_debit_id' => 4,
                'debit' => 10_000,
                'account_credit_id' => 1,
                'credit' => 0,
                'description' => 'Pembayaran Iuran Sampah Bulanan',
                'created_at' => now(),
            ],
            [
                'cash_mutation_code' => 'CMCRED-0000000001',
                'account_debit_id' => 4,
                'debit' => 0,
                'account_credit_id' => 1,
                'credit' => 10_000,
                'description' => 'Pembayaran Iuran Sampah Bulanan',
                'created_at' => now(),
            ],
            [
                'cash_mutation_code' => 'CMDEB-0000000002',
                'account_debit_id' => 5,
                'debit' => 10_000,
                'account_credit_id' => 2,
                'credit' => 0,
                'description' => 'Pembayaran Iuran Kematian Bulanan',
                'created_at' => now(),
            ],
            [
                'cash_mutation_code' => 'CMCRED-0000000002',
                'account_debit_id' => 5,
                'debit' => 0,
                'account_credit_id' => 2,
                'credit' => 10_000,
                'description' => 'Pembayaran Iuran Kematian Bulanan',
                'created_at' => now(),
            ],
            [
                'cash_mutation_code' => 'CMDEB-0000000003',
                'account_debit_id' => 4,
                'debit' => 10_000,
                'account_credit_id' => 3,
                'credit' => 0,
                'description' => 'Pembayaran Iuran Sampah Bulanan',
                'created_at' => now(),
            ],
            [
                'cash_mutation_code' => 'CMCRED-0000000003',
                'account_debit_id' => 4,
                'debit' => 0,
                'account_credit_id' => 3,
                'credit' => 10_000,
                'description' => 'Pembayaran Iuran Sampah Bulanan',
                'created_at' => now(),
            ],
        ];

        DB::table('cash_mutation')->insert($data);
        // DB::table('cash_mutation')->truncate();
    }
}
