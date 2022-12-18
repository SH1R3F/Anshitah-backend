<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireRequest;
use App\Http\Resources\QuestionnaireResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionnaireController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $results = Questionnaire::query()
            ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return QuestionnaireResource::collection($results);
    }

    public function show(Questionnaire $questionnaire): JsonResource
    {
        return QuestionnaireResource::make($questionnaire);
    }

    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire): Response
    {
        $data = $request->validated();

        // Upload file
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('questionnaire', ['disk' => 'public']);
            $data['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        $questionnaire->update($data);
        return response('', Response::HTTP_OK);
    }

    public function store(QuestionnaireRequest $request)
    {
        // Upload file
        $path = $request->file('file')->store('questionnaire', ['disk' => 'public']);
        $path = env('STORAGE_PATH') . 'app/public/' . $path;

        Questionnaire::create(['file' => $path] + $request->validated());

        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Questionnaire $questionnaire): Response
    {
        // Delete the adaa
        $questionnaire->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
