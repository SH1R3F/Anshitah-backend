<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\SchoolNashat;
use App\Services\PDFService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScholarActivityRequest;
use App\Http\Resources\ScholarActivityResource;
use App\Http\Resources\ScholarActivityCollection;

class ScholarActivityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $activities = SchoolNashat::search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        $users = User::pluck('name');

        return response()->json([
            'users' => $users,
            'activities' => new ScholarActivityCollection($activities)
        ]);
    }

    public function show(SchoolNashat $school_nashat): JsonResponse
    {

        $users = User::pluck('name');

        return response()->json([
            'users' => $users,
            'activity' => new ScholarActivityResource($school_nashat)
        ]);
    }

    public function update(ScholarActivityRequest $request, SchoolNashat $school_nashat): Response
    {
        $school_nashat->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(ScholarActivityRequest $request)
    {
        SchoolNashat::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(SchoolNashat $school_nashat): Response
    {
        // Delete the adaa
        $school_nashat->delete();

        return response('', Response::HTTP_OK); // 200
    }

    public function print(PDFService $service): JsonResponse
    {
        $path = $service->exportScholarActivities(SchoolNashat::all());
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }
}
