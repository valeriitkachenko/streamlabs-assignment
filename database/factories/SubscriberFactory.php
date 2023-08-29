<?php

namespace Database\Factories;

use App\Models\SubscriptionTier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SubscriberFactory extends Factory
{
    public function definition(): array
    {
        $subscriptionTiers = SubscriptionTier::get()->pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'subscription_tier_id' => $this->faker->randomElement($subscriptionTiers),
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'updated_at' => now(),
        ];
    }
}
