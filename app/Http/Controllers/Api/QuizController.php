<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\QuizRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizController extends Controller
{

    public function index(Request $request): JsonResource
    {
        $quizzes = Quiz::query()
            ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return QuizResource::collection($quizzes);
    }

    public function show(Quiz $quiz): JsonResource
    {
        return QuizResource::make($quiz->load('questions'));
    }

    public function update(QuizRequest $request, Quiz $quiz): Response
    {
        $data = $request->validated();

        // Update Quiz
        $quiz->update($data);

        // Update questions
        $quiz->questions()->delete();
        foreach ($data['questions'] as $question) {
            $quiz->questions()->create($question);
        }

        return response('', Response::HTTP_OK);
    }

    public function store(QuizRequest $request)
    {
        Quiz::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Quiz $quiz): Response
    {
        // Delete the adaa
        $quiz->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
