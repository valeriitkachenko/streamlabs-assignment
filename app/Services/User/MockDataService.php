<?php

namespace App\Services\User;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Follower;
use App\Models\MerchSale;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MockDataService
{
    protected const MIN_ENTRIES = 300;
    protected const MAX_ENTRIES = 500;

    public function seed(User $user): void
    {
        $userData = ['user_id' => $user->id];

        $this->seedSubscribers($userData, $this->getNumberToMake());
        $this->seedFollowers($userData, $this->getNumberToMake());
        $this->seedMerchSales($userData, $this->getNumberToMake());
        $this->seedDonations($userData, $this->getNumberToMake());
    }

    protected function seedSubscribers(array $userData, int $count): void
    {
        $this->seedWithEvents(Subscriber::factory(), $userData, $count);
    }

    protected function seedFollowers(array $userData, int $count): void
    {
        $this->seedWithEvents(Follower::factory(), $userData, $count);
    }

    protected function seedMerchSales(array $userData, int $count): void
    {
        $this->seedWithEvents(MerchSale::factory(), $userData, $count);
    }

    protected function seedDonations(array $userData, int $count): void
    {
        $this->seedWithEvents(Donation::factory(), $userData, $count);
    }

    protected function seedWithEvents(Factory $eventableFactory, array $userData, int $count): void
    {
        for ($i = 0; $i < $count; $i++) {
            Event::factory()->state($userData)->for(
                $eventableFactory->state($userData), 'eventable'
            )->create();
        }
    }

    protected function getNumberToMake(): int
    {
        return random_int(static::MIN_ENTRIES, static::MAX_ENTRIES);
    }
}
