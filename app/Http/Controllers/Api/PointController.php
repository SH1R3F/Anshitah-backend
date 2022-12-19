<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PointController extends Controller
{

    /* List students with their points */
    public function index(Request $request)
    {
        $students = DB::table('users')
            ->select('users.id', 'users.name', 'users.school', 'users.classes', DB::raw('IFNULL(SUM(points.point), 0) AS points_sum'))
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', '=', 'طالب')
            ->leftJoin('points', 'points.user_id', '=', 'users.id')
            ->groupBy('users.id')
            ->orderBy('points_sum', 'DESC')
            ->when($request->school, fn ($builder) => $builder->where('users.school', $request->school))
            ->when($request->year, fn ($builder) => $builder->where('users.classes', 'LIKE', "%[\"{$request->year}_%"))
            ->when($request->class, fn ($builder) => $builder->where('users.classes', 'LIKE', "%_{$request->class}\"]"))
            ->when(request()->user()->hasRole('معلم'), fn ($builder) => $builder->where('users.school', request()->user()->hasRole('معلم')->school))
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        $years = Year::pluck('name', 'id');


        return response()->json([
            'students' => $students,
            'years' => $years
        ]);
    }

    /* Add or Sub a point */
    public function point(Request $request, User $user)
    {
        $request->validate([
            'point' => 'required|in:1,-1'
        ]);

        $query = $user->points()->where('point', $request->point);

        if (request()->user()->hasRole('معلم')) {

            // Only can control his school students
            if ($user->school != request()->user()->school) return;

            // Only 3 per day
            if ($query->where('created_at', '>=', Carbon::today())->count() >= 3) {
                return response()->json([
                    'message' => 'تم بالفعل تغيير 3 نقط لهذا الطالب اليوم.'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Only 15 per month
            if ($query->where('created_at', '>=', Carbon::now()->startOfWeek())->count() >= 15) {
                return response()->json([
                    'message' => 'تم بالفعل تغيير 15 نقط لهذا الطالب هذا الأسبوع.'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

        // Add
        $user->points()->create([
            'point' => $request->point,
            'teacher_id' => request()->user()->id
        ]);

        return response()->noContent(Response::HTTP_CREATED);
    }

    /* Get my points and winners */
    public function myPoints(Request $request)
    {
        $winners = DB::table('users')
            ->select('users.id', 'users.name', 'users.school', DB::raw('IFNULL(SUM(points.point), 0) AS points_sum'))
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', '=', 'طالب')
            ->leftJoin('points', 'points.user_id', '=', 'users.id')
            ->groupBy('users.id')
            ->orderBy('points_sum', 'DESC')
            ->limit(3)
            ->get();

        $points = $request->user()->points()->sum('point');

        return response()->json([
            'points'  => $points,
            'winners' => $winners
        ]);
    }
}
