<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@rwis.com',
            'password' => Hash::make('admin'),
        ]);
        $this->call([
            HouseholdSeeder::class,
            ResidentSeeder::class,
            AddFamilyHeadSeeder::class,
            AssetSeeder::class,
            AccountSeeder::class,
            CashMutationSeeder::class,
            IssueReportSeeder::class,
            BroadcastTemplateSeeder::class,
            ScheduledMessageSeeder::class,
        ]);
    }
}
