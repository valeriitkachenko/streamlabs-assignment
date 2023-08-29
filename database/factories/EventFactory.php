<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Follower;
use App\Models\MerchSale;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        $eventable = $this->eventable();

        return [
            'eventable_id' => $eventable::factory(),
            'eventable_type' => $eventable,
            'read_at' => $this->faker->randomElement([null, now()]),
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'updated_at' => now(),
        ];
    }

    public function eventable()
    {
        return $this->faker->randomElement([
            Donation::class,
            Follower::class,
            MerchSale::class,
            Subscriber::class,
        ]);
    }
}
