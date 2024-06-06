<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Balai',
                'address' => 'Jl Loren Ipsum Dolor Sit Amet Gg. 69 Blok 420 No.13',
                'description' => 'gedung yang digunakan untuk pertemuan membahas agenda masyarakat',
                'image' => 'facility-image/web-1717709022.jpg',
                'is_archived' => false,
            ],
            [
                'name' => 'Posyandu',
                'address' => 'Jl Loren Ipsum Dolor Sit Amet Gg. 70 Blok 10 No.13',
                'description' => 'Posyandu (pos pelayanan terpadu) merupakan upaya 
                                  pemerintah untuk memudahkan masyarakat Indonesia 
                                  dalam memperoleh pelayanan kesehatan ibu dan anak.',
                'image' => 'facility-image/web-1717709022.jpg',
                'is_archived' => false,
            ],
            [
                'name' => 'Masjid An-Nur',
                'address' => 'Jl Loren Ipsum Dolor Sit Amet Gg. 88 Blok 400 No.13',
                'description' => 'bangunan yang berfungsi dipergunakan sebagai tempat shalat, 
                                  baik shalat lima waktu, shalat jumat maupun shalat hari raya',
                'image' => 'facility-image/web-1717709022.jpg',
                'is_archived' => false,
            ],
        ];

        DB::table('facility')->insert($data);
    }
}
