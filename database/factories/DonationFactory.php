<?php

namespace Database\Factories;

use App\Enums\Currencies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class DonationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount' => $this->randomAmount(),
            'currency' => $this->faker->randomElement(Currencies::values()),
            'message' => $this->faker->sentence(),
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'updated_at' => now(),
        ];
    }

    private function randomAmount(): float
    {
        return (float) (random_int(10, 10000) / 100);
    }
}
