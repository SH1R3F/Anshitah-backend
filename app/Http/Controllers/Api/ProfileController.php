<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    public function show(Request $request): JsonResponse
    {
        return response()->json(
            UserResource::make($request->user())
        );
    }

    public function update(UpdateProfileRequest $request)
    {

        $user = Auth::user();

        $data = $request->validated();

        // Upload avatar base_64
        if ($request->avatar && preg_match('/^data:image\/(\w+);base64,/', $request->avatar)) {
            $path = upload_base64_image($request->avatar, 'users/avatars/' . $user->id . '-avatar.');
            $data['avatar'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        /* User files upload */
        if ($request->hasFile('milaf_wadifi')) {
            $image = $request->file('milaf_wadifi');
            $path = $image->storeAs('users/milafat-wadifia', $user->id . '-milaf-wadifi.' . $image->extension(), [
                'disk' => 'public'
            ]);
            $data['milaf_wadifi'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        if ($request->hasFile('milaf_howiya')) {
            $image = $request->file('milaf_howiya');
            $path = $image->storeAs('users/milafat-howiya', $user->id . '-milaf-howiya.' . $image->extension(), [
                'disk' => 'public'
            ]);
            $data['milaf_howiya'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'status' => 'success',
            'daa' => $data
        ]);
    }
}
