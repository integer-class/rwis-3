<?php

namespace Database\Seeders;

use App\enum\StatusIssueReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'resident_id' => 1,
                'title' => 'Jalan Berlubang',
                'description' => 'Terdapat jalan Berlubang yang sangat mengganggu, tolong diperbaiki secepatnya',
                'status' => StatusIssueReport::Todo,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 2,
                'title' => 'Lampu Jalan Mati',
                'description' => 'Terdapat lampu jalan yang mati, tolong diperbaiki secepatnya',
                'status' => StatusIssueReport::InProgress,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 3,
                'title' => 'Ada orang nyetel jedag jedug',
                'description' => 'Ada warga A yang nyetel musik keras banget, tolong diingatkan ya pak RW',
                'status' => StatusIssueReport::InReview,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 4,
                'title' => 'Banyak beat mber',
                'description' => 'Ada warga B yang suka beat mber, tolong diingatkan ya pak RW. Berisik banget nih suaranya',
                'status' => StatusIssueReport::Done,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 5,
                'title' => 'Pohon Tumbang',
                'description' => 'Terdapat pohon tumbang di depan rumah saya, tolong diperbaiki secepatnya',
                'status' => StatusIssueReport::Todo,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 6,
                'title' => 'Toa Masjid Rusak',
                'description' => 'Toa masjid rusak, tolong diperbaiki secepatnya',
                'status' => StatusIssueReport::InProgress,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 7,
                'title' => 'Atap Balai RW bocor',
                'description' => 'Atap balai RW bocor, tolong diperbaiki secepatnya',
                'status' => StatusIssueReport::InReview,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 8,
                'title' => 'Cat Jalan Pudar',
                'description' => 'Cat jalan pudar, tolong di cat ulang secepatnya',
                'status' => StatusIssueReport::Done,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 9,
                'title' => 'Pos Jaga dikencingi kucing',
                'description' => 'Pos jaga dikencingi kucing, tolong dibersihkan secepatnya',
                'status' => StatusIssueReport::Todo,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 10,
                'title' => 'Posyandu Kotor',
                'description' => 'Posyandu kotor, tolong dibersihkan secepatnya',
                'status' => StatusIssueReport::InProgress,
                'is_approved' => true,
                'is_archived' => false,
            ],

        ];

        DB::table('issue_report')->insert($data);
        // DB::table('issue_report')->truncate();
    }
}
