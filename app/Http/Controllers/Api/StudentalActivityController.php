<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\TolabNashat;
use App\Services\PDFService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentalActivityRequest;
use App\Http\Resources\StudentalActivityResource;
use App\Http\Resources\StudentalActivityCollection;

class StudentalActivityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $activities = TolabNashat::search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        $users = User::pluck('name');

        return response()->json([
            'users' => $users,
            'activities' => new StudentalActivityCollection($activities)
        ]);
    }

    public function show(TolabNashat $tolab_nashat): JsonResponse
    {
        $users = User::pluck('name');

        return response()->json([
            'users' => $users,
            'activity' => new StudentalActivityResource($tolab_nashat)
        ]);
    }

    public function update(StudentalActivityRequest $request, TolabNashat $tolab_nashat): Response
    {
        $tolab_nashat->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(StudentalActivityRequest $request)
    {
        TolabNashat::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(TolabNashat $tolab_nashat): Response
    {
        // Delete the adaa
        $tolab_nashat->delete();

        return response('', Response::HTTP_OK); // 200
    }

    public function print(PDFService $service): JsonResponse
    {
        $path = $service->exportStudentalActivities(TolabNashat::all());
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }
}
