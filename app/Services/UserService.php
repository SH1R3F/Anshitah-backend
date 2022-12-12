<?php


namespace App\Services;

use Illuminate\Support\Facades\Hash;

class UserService
{

    public function updateUser($data, $user, $request)
    {
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
    }
}
