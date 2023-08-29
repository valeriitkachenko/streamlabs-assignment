<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'subscription_tier_id'
    ];

    protected $with = ['subscriptionTier'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionTier(): BelongsTo
    {
        return $this->belongsTo(SubscriptionTier::class);
    }

    public function scopeCreatedSince(Builder $query, Carbon $date): void
    {
        $query->whereDate('subscribers.created_at', '>=', $date);
    }
}
