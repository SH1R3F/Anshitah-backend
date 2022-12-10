<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AuthUserResource;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{

    public function user(Request $request): JsonResponse
    {
        return response()->json(
            UserResource::make($request->user())
        );
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED); // 401
        }
        $user = Auth::user()->load('roles');
        $token = $user->createToken('accessToken')->plainTextToken;
        return response()->json([
            'userData'    => AuthUserResource::make($user),
            'accessToken' => $token,
            'permissions' => $user->roles()->first()->permissions->map(fn ($p) => ['action' => $p->name])->push(['action' => 'basic']),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'تم تسجيل الخروج بنجاح'
        ]);
    }
}
