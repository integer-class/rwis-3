<?php

namespace Database\Seeders;

use App\Enum\GenderResident;
use App\Enum\MarriageStatusResident;
use App\Enum\NationalityResident;
use App\Enum\RangeIncomeResident;
use App\Enum\ReligionResident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 4867; $i++) {
            $data[] = [
                'household_id' => $i % 5 + 1,
                'nik' => fake('id_ID')->nik(),
                'full_name' => fake('id_ID')->name(),
                'place_of_birth' => fake('id_ID')->city(),
                'date_of_birth' => fake('id_ID')->date(),
                'gender' => fake()->randomElement([
                    GenderResident::LakiLaki,
                    GenderResident::Perempuan,
                ]),
                'blood_type' => fake('id_ID')->randomElement(['A', 'B', 'AB', 'O']),
                'religion' => fake()->randomElement([
                    ReligionResident::Islam,
                    ReligionResident::Kristen,
                    ReligionResident::Katolik,
                    ReligionResident::Hindu,
                    ReligionResident::Buddha,
                    ReligionResident::Konghucu,
                ]),
                'marriage_status' => fake()->randomElement([
                    MarriageStatusResident::BelumKawin,
                    MarriageStatusResident::Kawin,
                    MarriageStatusResident::CeraiHidup,
                    MarriageStatusResident::CeraiMati,
                ]),
                'nationality' => fake()->randomElement([
                    NationalityResident::WNI,
                    NationalityResident::WNA,
                ]),
                'range_income' => [
                    RangeIncomeResident::Group1,
                    RangeIncomeResident::Group2,
                    RangeIncomeResident::Group3,
                    RangeIncomeResident::Group4,
                    RangeIncomeResident::Group5,
                    RangeIncomeResident::Group6,
                ][5 - fake()->biasedNumberBetween(0, 5)],
                'job' => fake('id_ID')->jobTitle(),
                'whatsapp_number' => fake('id_ID')->phoneNumber(),
                'is_archived' => false,
            ];

        }
        $chunks = collect($data)->chunk(1000);
        foreach ($chunks as $chunk) {
            DB::table('resident')->insert($chunk->toArray());
        }
    }
}
