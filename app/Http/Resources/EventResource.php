<?php

namespace App\Http\Resources;

use App\Http\Resources\Traits\WhenMorphToLoaded;
use App\Models\Donation;
use App\Models\Follower;
use App\Models\MerchSale;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    use WhenMorphToLoaded;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'event_type' => $this->eventable_type,
            'event' => $this->whenMorphToLoaded('eventable', [
                Follower::class => FollowerResource::class,
                MerchSale::class => MerchSaleResource::class,
                Donation::class => DonationResource::class,
                Subscriber::class => SubscriberResource::class,
            ]),
            'read_at' => $this->read_at?->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
