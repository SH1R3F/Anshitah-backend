<?php

namespace App\Http\Controllers\Api;

use App\Models\QiasAdaa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\QiasAdaaRequest;
use App\Http\Resources\QiasAdaaResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class QiasAdaaController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $results = QiasAdaa::query()
            ->when($request->q, function ($builder) use ($request) {
                return $builder->where('name', 'LIKE', "%{$request->q}%")
                    ->orWhere('cause', 'LIKE', "%{$request->q}%");
            })
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return response()->json($results);
    }

    public function show(QiasAdaa $qias_adaa): JsonResponse
    {
        return response()->json($qias_adaa);
    }

    public function update(QiasAdaaRequest $request, QiasAdaa $qias_adaa): Response
    {
        $qias_adaa->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(QiasAdaaRequest $request)
    {
        QiasAdaa::create($request->validated());

        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(QiasAdaa $qias_adaa): Response
    {
        // Delete the adaa
        $qias_adaa->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
