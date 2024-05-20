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
                'title' => 'Jalan Bolong',
                'description' => 'Terdapat jalan bolong yang sangat mengganggu, tolong diperbaiki secepatnya',
                'image' => 'storage/app/public/report-image/jalan-lubang.jpg',
                'status' => StatusIssueReport::Todo,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 2,
                'title' => 'Lampu Jalan Mati',
                'description' => 'Terdapat lampu jalan yang mati, tolong diperbaiki secepatnya',
                'image' => 'storage/app/public/report-image/jalan-lubang.jpg',
                'status' => StatusIssueReport::Todo,
                'is_approved' => true,
                'is_archived' => false,
            ],
            [
                'resident_id' => 3,
                'title' => 'Jalan Berlubang',
                'description' => 'Terdapat jalan berlubang yang sangat mengganggu, tolong diperbaiki secepatnya',
                'image' => 'storage/app/public/report-image/jalan-lubang.jpg',
                'status' => StatusIssueReport::Todo,
                'is_approved' => true,
                'is_archived' => false,
            ],
        ];

        DB::table('issue_report')->insert($data);
        // DB::table('issue_report')->truncate();
    }
}
