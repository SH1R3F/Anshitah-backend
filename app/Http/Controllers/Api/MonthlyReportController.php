<?php

namespace App\Http\Controllers\Api;

use App\Services\PDFService;
use Illuminate\Http\Request;
use App\Models\MonthlyReport;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MonthlyReportRequest;
use App\Http\Resources\MonthlyReportResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MonthlyReportController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $reports = MonthlyReport::query()
            ->search($request, 'school')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return MonthlyReportResource::collection($reports);
    }

    public function show(MonthlyReport $monthly_report): JsonResource
    {
        return MonthlyReportResource::make($monthly_report);
    }

    public function update(MonthlyReportRequest $request, MonthlyReport $monthly_report): Response
    {
        $monthly_report->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(MonthlyReportRequest $request)
    {
        MonthlyReport::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(MonthlyReport $monthly_report): Response
    {
        // Delete the adaa
        $monthly_report->delete();

        return response('', Response::HTTP_OK); // 200
    }

    public function print(MonthlyReport $monthly_report, PDFService $service): JsonResponse
    {
        $path = $service->exportMonthlyReport($monthly_report);
        return response()->json([
            'path' => url("storage/$path")
        ]);
    }
}
