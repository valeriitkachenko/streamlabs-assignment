<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionTier extends Model
{
    protected $fillable = [
        'name',
    ];

    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscriber::class);
    }
}
