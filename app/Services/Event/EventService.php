<?php

namespace App\Services\Event;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class EventService
{
    protected const MAX_EVENTS = 100;

    public function getRecentUserEvents(User $user): LengthAwarePaginator
    {
        return $user->events()
            ->with('eventable')
            ->orderByDesc('created_at')
            ->paginate(self::MAX_EVENTS);
    }
}
