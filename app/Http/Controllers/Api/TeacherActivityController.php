<?php

namespace App\Http\Controllers\Api;

use App\Services\PDFService;
use Illuminate\Http\Request;
use App\Models\TeacherNashat;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherActivityRequest;
use App\Http\Resources\TeacherActivityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherActivityController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $activities = TeacherNashat::query()
            ->when($request->q, function ($builder) use ($request) {
                return $builder->where('raid', 'LIKE', "%{$request->q}%")
                    ->orWhere('modir', 'LIKE', "%{$request->q}%");
            })
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return TeacherActivityResource::collection($activities);
    }

    public function show(TeacherNashat $teacher_nashat): JsonResource
    {
        return new TeacherActivityResource($teacher_nashat);
    }

    public function update(TeacherActivityRequest $request, TeacherNashat $teacher_nashat): Response
    {
        $teacher_nashat->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(TeacherActivityRequest $request)
    {
        TeacherNashat::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }

    public function print(TeacherNashat $teacher_nashat, PDFService $service): JsonResponse
    {
        $path = $service->exportTeacherActivity($teacher_nashat);
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }

    public function destroy(TeacherNashat $teacher_nashat): Response
    {
        // Delete 
        $teacher_nashat->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
