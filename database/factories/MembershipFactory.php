<?php

namespace Database\Factories;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembershipFactory extends Factory
{
    protected $model = Membership::class;

    public function definition(): array
    {
        return [
            'number' => $this->faker->postcode,
            'status' => 'active',
            'member_id' => User::factory(),
        ];
    }
}
