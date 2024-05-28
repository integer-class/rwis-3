<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduledMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'broadcast_template_id' => 1,
                'sender_id' => 1,
                'receiver_id' => 1,
                'fields_values' => json_encode([
                    'name' => 'Azhar Testing',
                    'address' => 'Jakarta',
                    'date' => '2024-05-28',
                    'time' => '08:00',
                ]),
                'created_at' => now(),
            ],
            [
                'broadcast_template_id' => 2,
                'sender_id' => 1,
                'receiver_id' => 2,
                'fields_values' => json_encode([
                    'name' => 'Azhar Testing 2',
                    'address' => 'Jakarta',
                    'date' => '2024-05-28',
                    'time' => '08:00',
                ]),
                'created_at' => now(),
            ],
            [
                'broadcast_template_id' => 3,
                'sender_id' => 1,
                'receiver_id' => 3,
                'fields_values' => json_encode([
                    'name' => 'Azhar Testing 3',
                    'address' => 'Jakarta',
                    'date' => '2024-05-28',
                    'time' => '08:00',
                ]),
                'created_at' => now(),
            ],
        ];

        DB::table('scheduled_message')->insert($data);
        // DB::table('scheduled_message')->truncate();
    }
}
