<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\HighlightResource;
use App\Services\Event\HighlightsService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HighlightsController extends Controller
{
    public function __construct(
        protected HighlightsService $highlightsService
    ) {
    }

    public function index(Request $request): JsonResource
    {
        $highlights = $this->highlightsService->getHighlights($request->user());

        return new HighlightResource($highlights);
    }
}
