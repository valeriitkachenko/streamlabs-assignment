<?php

use App\Enums\Currencies;
use App\Models\SubscriptionTier;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    protected const DEFAULT_TIERS = [
        [
            'name' => 'Tier 1',
            'price' => 5,
            'currency' => Currencies::USD
        ],
        [
            'name' => 'Tier 2',
            'price' => 10,
            'currency' => Currencies::USD
        ],
        [
            'name' => 'Tier 3',
            'price' => 15,
            'currency' => Currencies::USD
        ]
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::DEFAULT_TIERS as $tier) {
            SubscriptionTier::where('name', $tier['name'])->update($tier);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
