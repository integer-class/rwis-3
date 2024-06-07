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
        for ($i = 1; $i <= 316; $i++) {
            $data[] = [
                'resident_id' => fake()->biasedNumberBetween(1, $i),
                'title' => fake('id_ID')->sentence(1),
                'description' => fake('id_ID')->sentence(10),
                'status' => fake()->randomElement([
                    StatusIssueReport::Todo,
                    StatusIssueReport::OnGoing,
                    StatusIssueReport::Solved
                ]),
                'approval_status' => fake()->randomElement([
                    ApprovalStatusIssueReport::Approved,
                    ApprovalStatusIssueReport::Rejected,
                    ApprovalStatusIssueReport::Pending,
                ]),
                'is_archived' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('issue_report')->insert($data);
    }
}
