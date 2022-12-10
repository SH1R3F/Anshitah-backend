<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * عرض الملف الشخصي
     */
    public function index()
    {
        return view('profile.index', [
            'title' => 'ملفي الشخصي'
        ]);
    }

    /**
     * تعديل ملف الشخصي
     */
    public function edit()
    {
        return view('profile.edit', [
            'title' => 'تعديل ملفي الشخصي'
        ]);
    }

    public function update(Request $request)
    {
        $storagepath = env('STORAGE_PATH');
        $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id . ',id',
            'rakm_howiya' => 'unique:users,rakm_howiya,' . Auth::user()->id . ',id',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if ($request->avatar) {
            $image    = $request->file('avatar');
            $filename = $user->id . '-avatar.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'users/avatars',
                $image,
                $filename
            );
            $user->avatar = $storagepath . 'users/avatars/' . $filename;
        }
        if ($request->milaf_howiya) {
            $image    = $request->file('milaf_howiya');
            $filename = $user->id . '-milaf-howiya.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'users/milafat-howiya',
                $image,
                $filename
            );
            $user->milaf_howiya = $storagepath . 'users/milafat-howiya/' . $filename;
        }
        if ($request->milaf_wadifi) {
            $image    = $request->file('milaf_wadifi');
            $filename = $user->id . '-milaf-wadifi.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'users/milafat-wadifia',
                $image,
                $filename
            );
            $user->milaf_wadifi = $storagepath . 'users/milafat-wadifia/' . $filename;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password))
            $user->password = $request->password;
        $user->address = $request->address;
        $user->rakm_howiya = $request->rakm_howiya;
        $user->mobile = $request->mobile;
        $user->university = $request->university;
        $user->takhasos = $request->takhasos;
        $user->date_birth = $request->date_birth;
        $user->date_graduation = $request->date_graduation;
        $user->date_job = $request->date_job;
        $user->rakm_wadifi = $request->rakm_wadifi;
        $user->current_job = $request->current_job;
        $user->save();
        $msg = "ثم تعديل بياناتك بنجاح !";
        return back()->with('update', $msg);
    }
}
