<?php

namespace App\Http\Controllers\Api;

use App\Models\Khotat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\KhotatRequest;
use App\Http\Resources\KhotatCollection;
use App\Http\Resources\KhotatResource;
use Illuminate\Http\Resources\Json\JsonResource;

class KhotatController extends Controller
{

    public function index(Request $request): JsonResource
    {
        $khotat = Khotat::query()
            ->search($request, 'name')
            ->when(request()->user()->hasRole('معلم'), fn ($builder) => $builder->where('schools', 'LIKE', '%' . request()->user()->school . '%'))
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return KhotatCollection::make($khotat);
    }

    public function store(KhotatRequest $request)
    {
        // Upload file
        $path = $request->file('file')->store('khotats', ['disk' => 'public']);
        $path = env('STORAGE_PATH') . 'app/public/' . $path;

        Khotat::create(['file' => $path] + $request->validated());
        return response()->noContent(Response::HTTP_CREATED); // 201
    }

    public function show(Khotat $khotat): JsonResource
    {
        return KhotatResource::make($khotat);
    }

    public function update(KhotatRequest $request, Khotat $khotat): JsonResource
    {
        $data = $request->validated();

        // Upload file
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('khotats', ['disk' => 'public']);
            $data['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        // Update year
        $khotat->update($data);
        return KhotatResource::make($khotat);
    }

    public function destroy(Khotat $khotat): Response
    {
        // Delete the year
        $khotat->delete();

        // Response
        return response()->noContent(Response::HTTP_OK); // 200
    }
}
