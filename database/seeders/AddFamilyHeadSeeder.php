<?php

namespace Database\Seeders;

use App\Models\HouseholdModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddFamilyHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 142; $i++) {
            $familyHead = HouseholdModel::find($i + 1);
            $familyHead->resident_id = $i + 1;
            $familyHead->save();
        }
    }
}
