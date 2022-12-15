<?php

namespace App\Http\Controllers\Api;

use App\Models\Donate;
use Illuminate\Http\Request;
use App\Models\DonateTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\DonationCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class DonationController extends Controller
{

    public function teachers(Request $request): JsonResource
    {
        $donations = DonateTeacher::query()
            ->search($request, 'name')
            ->when($request->school, fn ($builder) => $builder->where('school', $request->school))
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return DonationCollection::make($donations);
    }

    public function students(Request $request): JsonResource
    {
        $donations = Donate::query()
            ->when($request->q, function ($builder) use ($request) {
                return $builder
                    ->where('name', 'LIKE', "%{$request->q}%")
                    ->orWhere('school', 'LIKE', "%{$request->q}%")
                    ->orWhere('saf', 'LIKE', "%{$request->q}%");
            })
            ->when(!Auth::user()->hasRole('مدير'), fn ($builder) => $builder->where('school', Auth::user()->school))
            ->when($request->status == 'غير موافق عليها', fn ($builder) => $builder->where('active', 0), fn ($builder) => $builder->where('active', 1))
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return DonationCollection::make($donations);
    }

    public function delete(Donate $donate): Response
    {
        $donate->delete();
        return response()->noContent(Response::HTTP_OK);
    }

    public function toggle(Donate $donate): Response
    {
        $donate->active = !$donate->active;
        $donate->save();
        return response()->noContent(Response::HTTP_OK);
    }
}
