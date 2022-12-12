<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AuthUserResource;

class AuthController extends Controller
{

    public function user(Request $request): JsonResponse
    {
        $user = Auth::user()->load('roles');
        return response()->json(
            [
                'userData'    => AuthUserResource::make($user),
                'permissions' => $user->roles()->first()->permissions->map(fn ($p) => ['action' => $p->name])->push(['action' => 'basic']),
            ]
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
