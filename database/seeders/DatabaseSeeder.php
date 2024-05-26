<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Membership;
use App\Models\MembershipRequest;
use App\Models\OfficialIds;
use App\Models\PersonalInfo;
use App\Models\PhoneNumber;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->has(Membership::factory(), 'memberships')
            ->has(MembershipRequest::factory(2)
                ->sequence(
                    ['name' => 2023,'membership_id' => 1],
                    ['name' => 2024,'membership_id' => 1]
                ))
            ->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
            ]);
    }
}
