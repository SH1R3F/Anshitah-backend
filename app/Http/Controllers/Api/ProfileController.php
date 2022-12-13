<?php

namespace App\Http\Controllers\Api;

use App\Actions\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    public function show(Request $request): JsonResponse
    {
        return response()->json(
            UserResource::make($request->user())
        );
    }

    public function update(UpdateProfileRequest $request, UpdateUser $action)
    {
        $user = Auth::user();
        $action->handle($user, $request);
        return response()->json([
            'message' => 'تم التحديث بنجاح'
        ]);
    }
}
