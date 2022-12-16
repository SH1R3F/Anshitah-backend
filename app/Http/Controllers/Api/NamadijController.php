<?php

namespace App\Http\Controllers\Api;

use App\Models\Namadij;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\KhotatRequest;
use App\Http\Resources\KhotatResource;
use App\Http\Resources\KhotatCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class NamadijController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $namadij = Namadij::query()
            ->search($request, 'name')
            ->when(request()->user()->hasRole('معلم'), fn ($builder) => $builder->where('schools', 'LIKE', '%' . request()->user()->school . '%'))
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        // Same response as khotat so we gonna keep using it
        return KhotatCollection::make($namadij);
    }

    public function store(KhotatRequest $request)
    {
        // Upload file
        $path = $request->file('file')->store('namadijs', ['disk' => 'public']);
        $path = env('STORAGE_PATH') . 'app/public/' . $path;

        Namadij::create(['file' => $path] + $request->validated());
        return response()->noContent(Response::HTTP_CREATED); // 201
    }

    public function show(Namadij $namadij): JsonResource
    {
        return KhotatResource::make($namadij);
    }

    public function update(KhotatRequest $request, Namadij $namadij): JsonResource
    {
        $data = $request->validated();

        // Upload file
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('khotats', ['disk' => 'public']);
            $data['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        // Update year
        $namadij->update($data);
        return KhotatResource::make($namadij);
    }

    public function destroy(Namadij $namadij): Response
    {
        // Delete the year
        $namadij->delete();

        // Response
        return response()->noContent(Response::HTTP_OK); // 200
    }
}
