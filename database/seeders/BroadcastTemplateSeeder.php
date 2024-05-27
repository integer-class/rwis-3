<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BroadcastTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'text' => 'Halo {name}, ada rapat warga pada {date} di {location}',
                'fields' => json_encode(['name', 'date', 'location']),
                'type' => 'Pengumuman',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, pembayaran iuran {account} bulanan sudah bisa dilakukan',
                'fields' => json_encode(['name', 'account']),
                'type' => 'Pemberitahuan',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, taman baru sudah dibuka untuk umum',
                'fields' => json_encode(['name']),
                'type' => 'Info',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, jangan lupa untuk membayar iuran tahunan',
                'fields' => json_encode(['name']),
                'type' => 'Pemberitahuan',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, ada acara gotong royong pada {date}',
                'fields' => json_encode(['name', 'date']),
                'type' => 'Pengumuman',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, ada kegiatan sosial di {location} pada {date}',
                'fields' => json_encode(['name', 'location', 'date']),
                'type' => 'Pengumuman',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, ada perubahan jadwal rapat menjadi {date}',
                'fields' => json_encode(['name', 'date']),
                'type' => 'Info',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, ada kegiatan bakti sosial di {location} pada {date}',
                'fields' => json_encode(['name', 'location', 'date']),
                'type' => 'Pengumuman',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, jangan lupa untuk membayar iuran bulanan',
                'fields' => json_encode(['name']),
                'type' => 'Pemberitahuan',
                'created_at' => now(),
            ],
            [
                'text' => 'Halo {name}, ada perubahan lokasi rapat menjadi {location}',
                'fields' => json_encode(['name', 'location']),
                'type' => 'Info',
                'created_at' => now(),
            ],

        ];

        DB::table('broadcast_template')->insert($data);
        // DB::table('broadcast_template')->truncate();
    }
}
