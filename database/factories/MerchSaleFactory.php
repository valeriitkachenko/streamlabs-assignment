<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MerchSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->randomPrice();

        return [
            'name' => $this->faker->word,
            'amount' => $price * $this->randomQuantity(),
            'price' => $price,
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'updated_at' => now(),
        ];
    }

    private function randomPrice(): float
    {
        return (float) (random_int(10, 10000) / 100);
    }


    private function randomQuantity(): int
    {
        return random_int(1, 10);
    }
}
