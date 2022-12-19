<?php

namespace App\Http\Controllers\Api;

use Mpdf\Mpdf;
use App\Models\Ziyara;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\VisitRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\VisitResource;
use App\Services\PDFService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $visits = Ziyara::with('user')
            // ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return VisitResource::collection($visits);
    }

    public function show(Ziyara $visit): JsonResource
    {
        return VisitResource::make($visit->load('user'));
    }

    public function update(VisitRequest $request, Ziyara $visit): Response
    {
        $visit->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(VisitRequest $request)
    {
        request()->user()->ziyaras()->create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Ziyara $visit): Response
    {
        // Delete the adaa
        $visit->delete();
        return response('', Response::HTTP_OK); // 200
    }

    public function print(Request $request, PDFService $service): JsonResponse
    {
        $path = $service->exportVisits(Ziyara::with('user')->get());
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }
}
