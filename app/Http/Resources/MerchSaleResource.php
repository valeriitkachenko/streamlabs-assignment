<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchSaleResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'amount' => number_format($this->amount, 2, '.', ' '),
            'price' => number_format($this->price, 2, '.', ' '),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
