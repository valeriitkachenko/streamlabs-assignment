<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Services\Event\EventService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventsController extends Controller
{
    public function __construct(
        protected EventService $eventService
    ) {

    }

    public function index(Request $request): JsonResource
    {
        $events = $this->eventService->getRecentUserEvents($request->user());

        return EventResource::collection($events);
    }
}
