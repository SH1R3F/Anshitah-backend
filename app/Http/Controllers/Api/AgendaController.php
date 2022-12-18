<?php

namespace App\Http\Controllers\Api;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaRequest;
use App\Http\Resources\AgendaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AgendaController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $agendas = Agenda::query()
            ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return AgendaResource::collection($agendas);
    }

    public function show(Agenda $agenda): JsonResource
    {
        return AgendaResource::make($agenda);
    }

    public function update(AgendaRequest $request, Agenda $agenda): Response
    {
        $agenda->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(AgendaRequest $request)
    {
        Agenda::create($request->validated());

        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Agenda $agenda): Response
    {
        // Delete the agenda
        $agenda->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
