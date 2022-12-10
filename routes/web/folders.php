<?php

use Illuminate\Support\Facades\Route;
use App\Models\File;
use App\Models\FileShared;
use App\Models\Folder;
use App\Models\GroupePermission;
use App\Models\Shared;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;


Route::prefix('/folders')->group(function(){
    Route::get('/', function () {
        return view('folders.index', [
            'title' => 'ملفاتي',
            'shareds' => Shared::all(),
            'folders' => Auth::user()->folders,
        ]);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('folders');

    Route::get('/details/{id}', function ($id) {
        $folders = Folder::findOrFail($id);
        return response()->json($folders);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('folders.details');

    Route::post('/store', function (Request $request) {
        $folder = new Folder();
        $folder->name = $request->name;
        $folder->description = $request->description;
        $folder->user_id = Auth::user()->id;
        if ($request->folder_id)
            $folder->folder_id = $request->folder_id;
        if ($request->status)
            $folder->status = true;
        $folder->save();
        return back()->with('create', 'ثم إنشاء المجلد بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('folders.store');

    Route::post('/delete/{id}', function ($id) {
        $folder = Folder::findOrFail($id);
        $folder->delete();
        return back()->with('delete', 'ثم حذف المجلد بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('folders.delete');

    Route::post('/update/{id}', function (Request $request , $id) {
        $folder = Folder::findOrFail($id);
        $folder->name = $request->name;
        $folder->description = $request->description;
        $folder->save();
        return back()->with('update', 'ثم تعديل المجلد بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('folders.update');

    Route::get('/user/{id}', function (Request $request , $id) {
        $user = User::findOrFail($id);
        return view('folders.user' , [
            'title' => 'ملفات المعلم',
            'folders' => $user->folders
        ]);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('folders.user');
});
Route::prefix('/files')->group(function(){
    Route::post('/store', function (Request $request) {
        $storagepath = env('STORAGE_PATH');
        $file = new File();
        $file->name = $request->name;
        $file->description = $request->description;
        $file->folder_id = $request->folder_id;
        $file->href = $request->href;
        if ($request->path) {
            $image    = $request->file('path');
            $filename = time() . '-file.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'files',
                $image,
                $filename
            );
            $file->path = $storagepath . 'files/' . $filename;
        }
        $file->save();
        return back()->with('create', 'ثم إنشاء الملف بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('files.store');

    Route::get('/{id}', function ($id) {
        $files = File::where('folder_id' , $id)->get();
        return view('folders.includes.folders-table' , compact('files'));
    })
    ->middleware(['permission:عرض المجلدات', 'permission:عرض المجلدات'])
    ->name('files');

    // For students
    Route::get('students/{id}', function ($id) {
        $files = File::where('folder_id' , $id)->get();
        return view('student-subjects.includes.folders-table' , compact('files'));
    })
    ->middleware(['permission:المادة الدراسية'])
    ->name('files-student');

    Route::get('/shareds/{id}', function ($id) {
        $files = File::where('folder_id', $id)->get();
        return response()->json($files);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('shareds.files');

    // Route::get('/edit/{id}', function ($id) {
    //     $files = File::findOrFail($id);
    //     return response()->json($files);
    // })
    // ->middleware(['permission:عرض المجلدات'])
    // ->name('edit.files');
    Route::get('/edit/{id}', function ($id) {
        $files = File::findOrFail($id);
        return response()->json($files);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('edit.files');

    Route::post('/update/{id}', function (Request $request , $id) {
        // dd($request);
        $storagepath = env('STORAGE_PATH');
        $file = File::findOrFail($id);
        $file->name = $request->name;
        $file->description = $request->description;
        $file->href = $request->href;
        if ($request->path) {
            $image    = $request->file('path');
            $filename = time() . '-file.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'files',
                $image,
                $filename
            );
            $file->path = $storagepath . 'files/' . $filename;
        }
        $file->save();
        return back()->with('create', 'ثم تعديل الملف بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('update.files');

    Route::post('/delete/{id}', function ($id) {
        $file = File::find($id);
        $file->delete();
        return back()->with('delete', 'ثم حذف الملف بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('delete.sharedfiles');
});
Route::prefix('/shareds')->group(function(){

    Route::post('/store', function (Request $request) {
        $folder = new Shared();
        $folder->name = $request->name;
        $folder->description = $request->description;
        $folder->user_id = Auth::user()->id;
        if($request->permission){
            $grp = new GroupePermission();
            $grp->name = $request->permission;
            $grp->save();
            $permissions = [
                'عرض ' . $request->permission ,
                'تعديل ' . $request->permission ,
                'حذف ' . $request->permission ,
                'رفع ملف ' . $request->permission,
                'عرض الملفات ' . $request->permission
            ];
            $folder->permission = 'عرض ' . $request->permission;
            $exist = Permission::where('name' , $request->permission)->get();
            // dd($exist);
            if($exist->count() == 0){
                foreach($permissions as $permission){
                    Permission::create(['name' => $permission , 'groupe_id' => $grp->id]);
                }
            }
            foreach(\App\Models\User::all() as $user){
                $user->givePermissionTo($permissions);
            }
        }
        if ($request->shared_id)
            $folder->shared_id = $request->shared_id;
        $folder->save();
        return back()->with('create', 'ثم إنشاء مجلد مشترك بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('shareds.store'); //إنشاء مجلد مشترك

    Route::post('/delete/{id}', function ($id) {
        $folder = Shared::findOrFail($id);
        // $permission = Permission::findByName($folder->permission);
        // Permission::destroy($permission->id);
        $folder->delete();
        return back()->with('delete', 'ثم حذف مجلد مشترك بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('shareds.delete'); // حذف مجلد مشترك


    Route::get('/details/{id}', function ($id) {
        $folders = Shared::findOrFail($id);
        return response()->json($folders);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('shareds.details');

    Route::post('/update/{id}', function (Request $request , $id) {
        $folder = Shared::findOrFail($id);
        // Delete Old Permissions
        $permissions = Permission::where('name' , 'like' , "%$folder->name%")->get();
        $groupePermissions = GroupePermission::findOrFail($permissions[0]->groupe_id);
        foreach($permissions as $permission){
            $permission->delete();
        }
        $groupePermissions->delete();
        // Create New Permissions
        $grp = new GroupePermission();
        $grp->name = $request->permission;
        $grp->save();
        $permissions = [
            'عرض ' . $request->permission ,
            'تعديل ' . $request->permission ,
            'حذف ' . $request->permission ,
            'رفع ملف ' . $request->permission,
            'عرض الملفات ' . $request->permission
        ];
        $folder->permission = 'عرض ' . $request->permission;
        $exist = Permission::where('name' , $request->permission)->get();
            // dd($exist);
        if($exist->count() == 0){
            foreach($permissions as $permission){
                Permission::create(['name' => $permission , 'groupe_id' => $grp->id]);
            }
        }
        foreach(\App\Models\User::all() as $user){
            $user->givePermissionTo($permissions);
        }

        $folder->name = $request->name;
        $folder->description = $request->description;
        $folder->save();
        return back()->with('update', 'ثم تعديل مجلد مشترك بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('shareds.update'); // تعديل مجلد مشترك
});
Route::prefix('/sharedfiles')->group(function(){
    Route::post('/store', function (Request $request) {
        $storagepath = env('STORAGE_PATH');
        $file = new FileShared();
        $file->name = $request->name;
        $file->description = $request->description;
        $file->shared_id = $request->shared_id;
        $file->user_id = Auth::user()->id;
        $file->href = $request->href;
        if ($request->path) {
            $image    = $request->file('path');
            $filename = time() . '-file.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'files',
                $image,
                $filename
            );
            $file->path = $storagepath . 'files/' . $filename;
        }
        $file->save();
        return back()->with('create', 'ثم إنشاء الملف بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('sharedfiles.store');
    Route::get('/{id}', function ($id) {
        // can('إنشاء مجلدات مشتركة'){

        // }
        // if(Auth::user()->can('إنشاء مجلدات مشتركة')){
        //     $files = FileShared::where('shared_id', $id)
        //                         ->get();
        // }else{
        //     $files = FileShared::where('shared_id', $id)
        //                         // ->where('user_id' , Auth::user()->id)
        //                         ->get();
        // }
        // foreach($files as $file){
        //     $file->user = \App\Models\User::findOrFail($file->user_id)->name;
        //     // dd($file);
        // }
        $sharedfiles = FileShared::where('shared_id' , $id)->get();
        // return response()->json($files);
        return view('folders.includes.table' , compact('sharedfiles'));
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('sharedfiles');
    Route::get('/{id}/teacher',function($id){
        $ids   = [Auth::user()->id];
        $users = User::all();
        foreach($users as $user){
            if($user->hasPermissionTo('إنشاء مجلدات مشتركة')){
                $ids[] = $user->id;
            }
        }
        $files = FileShared::where('shared_id', $id)
                            ->whereIn('user_id', $ids)
                            ->get();
        foreach($files as $file){
            $file->user = \App\Models\User::findOrFail($file->user_id)->name;
            // dd($file);
        }
        return response()->json($files);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('sharedfilesteacher')
    ;
    Route::get('/edit/{id}', function ($id) {
        $files = FileShared::findOrFail($id);
        return response()->json($files);
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('edit.sharedfiles');

    Route::post('/update/{id}', function (Request $request , $id) {
        // dd($request);
        $storagepath = env('STORAGE_PATH');
        $file = FileShared::findOrFail($id);
        $file->name = $request->name;
        $file->description = $request->description;
        $file->href = $request->href;
        if ($request->path) {
            $image    = $request->file('path');
            $filename = time() . '-file.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'files',
                $image,
                $filename
            );
            $file->path = $storagepath . 'files/' . $filename;
        }
        $file->save();
        return back()->with('create', 'ثم تعديل الملف بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('update.sharedfiles');

    Route::post('/delete/{id}', function ($id) {
        $file = FileShared::find($id);
        if($file == null) {
            $file = File::find($id);
        }
        $file->delete();
        return back()->with('delete', 'ثم حذف الملف بنجاح !');
    })
    ->middleware(['permission:عرض المجلدات'])
    ->name('delete.sharedfiles');
});

