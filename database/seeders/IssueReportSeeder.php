<?php

namespace Database\Seeders;

use App\Enum\ApprovalStatusIssueReport;
use App\Enum\StatusIssueReport;
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
        $data = [];
        for ($i = 1; $i <= 2743; $i++) {
            $data[] = [
                'resident_id' => fake()->biasedNumberBetween(1, $i),
                'title' => fake('id_ID')->sentence(1),
                'description' => fake('id_ID')->sentence(10),
                'status' => StatusIssueReport::Todo,
                'approval_status' => ApprovalStatusIssueReport::Pending,
                'is_archived' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $chunks = collect($data)->chunk(1000);
        foreach ($chunks as $chunk) {
            DB::table('issue_report')->insert($chunk->toArray());
        }
    }
}
