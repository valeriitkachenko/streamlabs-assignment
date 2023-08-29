<?php

use App\Models\SubscriptionTier;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    protected const DEFAULT_TIERS = [
        ['name' => 'Tier 1'],
        ['name' => 'Tier 2'],
        ['name' => 'Tier 3']
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        SubscriptionTier::insert(self::DEFAULT_TIERS);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
