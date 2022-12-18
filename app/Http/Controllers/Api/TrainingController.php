<?php

namespace App\Http\Controllers\Api;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Http\Resources\TrainingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $trainings = Training::query()
            ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return TrainingResource::collection($trainings);
    }

    public function show(Training $training): JsonResource
    {
        return TrainingResource::make($training);
    }

    public function update(TrainingRequest $request, Training $training): Response
    {
        $data = $request->validated();

        // Upload file
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('trainings', ['disk' => 'public']);
            $data['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        $training->update($data);
        return response('', Response::HTTP_OK);
    }

    public function store(TrainingRequest $request)
    {
        // Upload file
        $path = $request->file('file')->store('trainings', ['disk' => 'public']);
        $path = env('STORAGE_PATH') . 'app/public/' . $path;

        Training::create(['file' => $path] + $request->validated());

        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Training $training): Response
    {
        // Delete the adaa
        $training->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
