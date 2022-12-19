<?php

namespace App\Http\Controllers\Api;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\AchievementRequest;
use App\Http\Resources\AchievementResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AchievementController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $achievements = Achievement::query()
            ->when($request->q, function ($builder) use ($request) {
                return $builder
                    ->where('name', 'LIKE', "%{$request->q}%")
                    ->orWhere('stage', 'LIKE', "%{$request->q}%")
                    ->orWhere('genre', 'LIKE', "%{$request->q}%");
            })
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return AchievementResource::collection($achievements);
    }

    public function show(Achievement $achievement): JsonResource
    {
        return AchievementResource::make($achievement);
    }

    public function update(AchievementRequest $request, Achievement $achievement): Response
    {
        $achievement->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(AchievementRequest $request)
    {
        Achievement::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Achievement $achievement): Response
    {
        // Delete the adaa
        $achievement->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
