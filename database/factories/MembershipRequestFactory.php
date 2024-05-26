<?php

namespace Database\Factories;

use App\Models\Membership;
use App\Models\MembershipRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembershipRequestFactory extends Factory
{
    protected $model = MembershipRequest::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'membership_id' => Membership::factory(),
            'member_id' => User::factory(),
        ];
    }

}
