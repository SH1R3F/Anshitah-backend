<?php

namespace App\Http\Controllers\Api;

use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\YearRequest;
use App\Http\Resources\YearResource;
use App\Http\Resources\YearCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class YearController extends Controller
{

    public function index(Request $request): JsonResource
    {
        $years = Year::query()
            ->search($request, 'name')
            ->orderBy('id')->get();
        return YearCollection::make($years);
    }

    public function store(YearRequest $request): Response
    {
        Year::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED); // 201
    }

    public function show(Year $year): JsonResource
    {
        return YearResource::make($year);
    }

    public function update(YearRequest $request, Year $year): JsonResource
    {
        // Update year
        $year->update($request->validated());
        return YearResource::make($year);
    }

    public function destroy(Year $year): Response
    {
        // Delete the year
        $year->delete();

        // Response
        return response()->noContent(Response::HTTP_OK); // 200
    }
}
