<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Lorem Ipsum Dolor Sit Amet',
                'address' => 'Jl. Lorem Ipsum Dolor Sit Amet Gg. 69 Blok 420 No. 13',
                'description' => 'UMKM ini menjual makanan ringan',
                'whatsapp_number' => +6281234567890,
                'image' => 'umkm-image/web-1717709498.png',
            ],
            [
                'name' => 'Lorem Ipsum Dolor Sit Amet',
                'address' => 'Jl. Lorem Ipsum Dolor Sit Amet Gg. 69 Blok 420 No. 13',
                'description' => 'UMKM ini menjual minuman yang menyegarkan',
                'whatsapp_number' => +6285233860866,
                'image' => 'umkm-image/web-1717709498.png',
            ],
        ];
        DB::table('umkm')->insert($data);
    }
}
