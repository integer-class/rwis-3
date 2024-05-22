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

        $familyHead1 = HouseholdModel::find(1);
        $familyHead1->resident_id = 1;
        $familyHead1->save();

        $familyHead2 = HouseholdModel::find(2);
        $familyHead2->resident_id = 2;
        $familyHead2->save();

        $familyHead3 = HouseholdModel::find(3);
        $familyHead3->resident_id = 3;
        $familyHead3->save();
    }
}
