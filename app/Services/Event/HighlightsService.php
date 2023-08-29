<?php

namespace App\Services\Event;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HighlightsService
{
    protected const DEFAULT_PERIOD_IN_DAYS = 30;
    protected const TOP_ITEMS_LIMIT = 3;

    public function getHighlights(User $user, int $periodInDays = self::DEFAULT_PERIOD_IN_DAYS): array
    {
        $dateFrom = now()->subDays($periodInDays);

        return [
            'total_revenue' => $this->getTotalRevenue($user, $dateFrom),
            'total_followers' => $this->getTotalAmountOfNewFollowers($user, $dateFrom),
            'top_items' => $this->getTopItems($user, $dateFrom)
        ];
    }

    protected function getTotalRevenue(User $user, Carbon $dateFrom): float
    {
        $subscriptionsRevenue = $this->getSubscriptionsRevenue($user, $dateFrom);
        $donationsRevenue = $this->getDonationsRevenue($user, $dateFrom);
        $merchSalesRevenue = $this->getMerchSalesRevenue($user, $dateFrom);

        return $subscriptionsRevenue + $donationsRevenue + $merchSalesRevenue;
    }

    protected function getDonationsRevenue(User $user, Carbon $dateFrom): float
    {
        return $user->donations()->createdSince($dateFrom)->sum('amount');
    }

    protected function getSubscriptionsRevenue(User $user, Carbon $dateFrom): float
    {
        return $user->subscribers()
            ->join('subscription_tiers', 'subscribers.subscription_tier_id', '=', 'subscription_tiers.id')
            ->createdSince($dateFrom)
            ->sum('subscription_tiers.price');
    }

    protected function getMerchSalesRevenue(User $user, Carbon $dateFrom): float
    {
        return $user->merchSales()->createdSince($dateFrom)->sum('amount');
    }

    protected function getTotalAmountOfNewFollowers(User $user, Carbon $dateFrom): int
    {
        return $user->followers()->createdSince($dateFrom)->count();
    }

    protected function getTopItems(User $user, Carbon $dateFrom): Collection
    {
        return $user->merchSales()->select('name', DB::raw('SUM(amount) as total_amount'))
                ->createdSince($dateFrom)
                ->groupBy('name')
                ->orderByDesc('total_amount')
                ->limit(self::TOP_ITEMS_LIMIT)
                ->get();
    }
}
