<?php

namespace App\Http\Controllers\Api;

use App\Actions\EvaluateReport;
use App\Models\Report;
use App\Services\PDFService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Resources\ReportResource;
use App\Models\Evaluation;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $reports = Report::with('evaluation')
            ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return ReportResource::collection($reports);
    }

    public function show(Report $report): JsonResource
    {
        return ReportResource::make($report);
    }

    public function update(ReportRequest $request, Report $report, ReportService $service): Response
    {
        $service->update($request->validated(), $report);
        return response()->noContent(Response::HTTP_OK);
    }

    public function store(ReportRequest $request, ReportService $service)
    {
        $service->store($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Report $report): Response
    {
        // Delete the adaa
        $report->delete();

        return response('', Response::HTTP_OK); // 200
    }

    public function print(Report $report, PDFService $service): JsonResponse
    {
        $path = $service->exportReport($report->load('evaluation'));
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }

    public function evaluation(Report $report): JsonResponse
    {
        return response()->json($report->evaluation()->with('report')->first());
    }


    public function evaluate(Request $request, Report $report, EvaluateReport $action): Response
    {
        $action->handle($request, $report);
        return response()->noContent(Response::HTTP_OK);
    }

    public function printEvaluation(Report $report, PDFService $service): JsonResponse
    {
        $path = $service->exportEvaluation($report->load('evaluation'));
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }
}
