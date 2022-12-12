<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserService;

class ProfileController extends Controller
{

    public function show(Request $request): JsonResponse
    {
        return response()->json(
            UserResource::make($request->user())
        );
    }

    public function update(UpdateProfileRequest $request, UserService $service)
    {
        $user = Auth::user();
        $service->updateUser($request->validated(), $user, $request);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
