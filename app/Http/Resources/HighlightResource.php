<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HighlightResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'total_revenue' => Helpers::formatAmount($this['total_revenue'] ?? 0),
            'total_followers' => $this['total_followers'] ?? 0,
            'top_items' => MerchSaleHighlightResource::collection($this['top_items'] ?? []),
        ];
    }
}
