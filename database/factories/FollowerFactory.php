<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FollowerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'updated_at' => now(),
        ];
    }
}
