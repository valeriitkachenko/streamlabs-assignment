<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MerchSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'price',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCreatedSince(Builder $query, Carbon $date): void
    {
        $query->whereDate('merch_sales.created_at', '>=', $date);
    }
}
