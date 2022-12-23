<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Year;
use App\Models\Medical;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalRequest;
use App\Http\Resources\MedicalResource;
use App\Http\Resources\MedicalCollection;

class MedicalController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $medicals = Medical::query()
            ->search($request, 'name')
            ->when($request->status, fn ($builder) => $builder->where('status', $request->status))
            ->when($request->year, fn ($builder) => $builder->where('year', $request->year))
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);


        $years = Year::orderBy('id')->pluck('name');
        $users = User::whereHas('roles', fn ($builder) => $builder->where('name', '!=', 'طالب'))->pluck('name');

        return response()->json([
            'medicals' => new MedicalCollection($medicals),
            'years' => $years,
            'users' => $users
        ]);
    }

    public function show(Medical $medical): JsonResponse
    {
        $years = Year::orderBy('id')->pluck('name');
        $users = User::whereHas('roles', fn ($builder) => $builder->where('name', '!=', 'طالب'))->pluck('name');

        return response()->json([
            'medical' => new MedicalResource($medical),
            'years' => $years,
            'users' => $users
        ]);
    }

    public function update(MedicalRequest $request, Medical $medical): Response
    {
        $medical->update($request->validated());
        return response()->noContent(Response::HTTP_OK);
    }

    public function store(MedicalRequest $request)
    {
        Medical::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Medical $medical): Response
    {
        // Delete the adaa
        $medical->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
