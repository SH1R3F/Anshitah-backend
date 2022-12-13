<?php

namespace App\Actions;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UpdateUser
{

    public function handle($user, $request)
    {
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

        // I didn't exclude this from my-profile controller.
        // Because, I think I might want to implement it there later.
        if ($request->hasFile('al_jadwal_dirassi')) {
            $image = $request->file('al_jadwal_dirassi');
            $path = $image->storeAs('users/milafat-howiya', $user->id . '-al_jadwal_dirassi.' . $image->extension(), [
                'disk' => 'public'
            ]);
            $data['al_jadwal_dirassi'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($data['role']) {
            // Remove previous roles
            $user->syncRoles(Role::where('name', $request->role)->first());
        }

        if ($data['classes']) {
            $data['classes'] = json_encode(explode(',', $data['classes']));
        }

        $user->update($data);
    }
}
