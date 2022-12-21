<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Services\PDFService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ZiyaratMochrif;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorVisitRequest;
use App\Http\Resources\SupervisorVisitResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SupervisorVisitCollection;

class SupervisorVisitController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $supervisor_visits = ZiyaratMochrif::with('user')
            // ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        $supervisors = User::whereHas('roles', fn ($builder) => $builder->whereIn('name', ['رائد نشاط', 'مدير']))->pluck('id', 'name');

        return response()->json([
            'supervisors' => $supervisors,
            'visits' => SupervisorVisitCollection::make($supervisor_visits)
        ]);
    }

    public function show(ZiyaratMochrif $supervisor_visit): JsonResponse
    {
        $supervisors = User::whereHas('roles', fn ($builder) => $builder->whereIn('name', ['رائد نشاط', 'مدير']))->pluck('id', 'name');

        return response()->json([
            'supervisors' => $supervisors,
            'visit' => SupervisorVisitResource::make($supervisor_visit->load('user'))
        ]);
    }

    public function update(SupervisorVisitRequest $request, ZiyaratMochrif $supervisor_visit): Response
    {
        $supervisor_visit->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(SupervisorVisitRequest $request)
    {
        $visit = request()->user()->ziyaratmochrifs()->create($request->validated());
        return response()->json($visit, Response::HTTP_CREATED);
    }


    public function destroy(ZiyaratMochrif $supervisor_visit): Response
    {
        // Delete the adaa
        $supervisor_visit->delete();
        return response('', Response::HTTP_OK); // 200
    }

    public function print(ZiyaratMochrif $supervisor_visit, PDFService $service): JsonResponse
    {
        $path = $service->exportVisit($supervisor_visit->load('user'));
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }
}
