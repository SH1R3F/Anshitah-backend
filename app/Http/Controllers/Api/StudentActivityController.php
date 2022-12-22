<?php

namespace App\Http\Controllers\Api;

use App\Models\StudentField;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentActivityRequest;
use App\Http\Resources\StudentActivityResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\StudentActivityCollection;
use App\Models\User;
use App\Models\Year;

class StudentActivityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $activities = StudentField::search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        $students = User::whereHas('roles', fn ($builder) => $builder->where('name', 'طالب'))->pluck('name');
        $years = Year::orderBy('id')->pluck('name');

        return response()->json([
            'students' => $students,
            'years' => $years,
            'activities' => new StudentActivityCollection($activities)
        ]);
    }

    public function show(StudentField $student_field): JsonResponse
    {

        $students = User::whereHas('roles', fn ($builder) => $builder->where('name', 'طالب'))->pluck('name');
        $years = Year::orderBy('id')->pluck('name');

        return response()->json([
            'students' => $students,
            'years' => $years,
            'activity' => new StudentActivityResource($student_field)
        ]);
    }

    public function update(StudentActivityRequest $request, StudentField $student_field): Response
    {
        $student_field->update($request->validated());
        return response('', Response::HTTP_OK);
    }

    public function store(StudentActivityRequest $request)
    {
        StudentField::create($request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(StudentField $student_field): Response
    {
        // Delete the adaa
        $student_field->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
