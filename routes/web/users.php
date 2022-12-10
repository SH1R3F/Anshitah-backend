<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Year;

Route::prefix('/users')->group(function () {
    Route::get('/', function () {
        return view('users.index', [
            'title' => 'العناصر البشرية',
            'users' => User::whereHas('roles' , function($query) {
                $query->where('name','!=', 'طالب');
            })->get()
        ]);
    })
        ->middleware(['permission:عرض المستخدمين'])
        ->name('users');
    Route::get('/{id}', function ($id) {
        $user = User::findOrFail($id);
        return view('users.show', [
            'title' => "معلومات المستخدم $user->name",
            'user' => $user
        ]);
    })
        ->middleware(['permission:عرض المستخدمين'])
        ->name('users.show');
    Route::get('/permissions/{id}', function ($id) {
        $user = User::findOrFail($id);
        return view('users.permissions', [
            'title' => "صلاحيات المستخدم $user->name",
            'permissions' => Permission::all(),
            'user' => $user
        ]);
    })
        ->middleware(['permission:إعطاء الصلاحيات'])
        ->name('users.permissions');
    Route::post('/permissions/{id}', function (Request $request, $id) {
        $user = User::findOrFail($id);
        $rolePermissions = $user->getPermissionsViaRoles();
        $array = [];
        foreach($rolePermissions as $rolePermission){
            $array[] = $rolePermission->name;
        }
        foreach ($user->getDirectPermissions() as $p) {
            $user->revokePermissionTo($p->name);
        }
        foreach ($request->permissions as $p) {
            if(!in_array($p,$array)){
                $user->givePermissionTo($p);
            }
        }
        return back()->with('update', 'ثم تعديل الصلاحيات بنجاح !');
    })
        ->middleware(['permission:إعطاء الصلاحيات'])
        ->name('users.permissions');
    Route::get('/edit/{id}', function ($id) {
        $user = User::findOrFail($id);
        $schools = [
            'ابتدائية الأندلس',
            'ابتدائية الإمام عاصم لتحفيظ القرآن',
            'ابتدائية الجزيرة',
            'ابتدائية الحويلات',
            'ابتدائية الدانة',
            'ابتدائية الدفي',
            'ابتدائية الرياض',
            'ابتدائية الفناتير',
            'ابتدائية الفيحاء',
            'ابتدائية المرجان',
            'ابتدائية المطرفية',
            'ابتدائية الواحة',
            'ابتدائية جلمودة',
            'ابتدائية حراء',
            'ابتدائية نجد',
            'ابتدائية هجر',
            'ثانوية أم القرى - مقررات',
            'ثانوية الأحساء - مقررات',
            'ثانوية الدفي - مقررات',
            'ثانوية الرواد',
            'ثانوية العلا',
            'ثانوية نجد - مقررات',
            'متوسطة أم القرى',
            'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
            'متوسطة الخليج',
            'متوسطة الصديق',
            'متوسطة الفاروق',
            'متوسطة المروج',
            'متوسطة نجد'
        ];
        return view('users.edit', [
            'title' => "معلومات المستخدم $user->name",
            'user' => $user,
            'roles' => Role::all(),
            'years' => Year::all(),
            'schools' => $schools
        ]);
    })
        ->middleware(['permission:عرض المستخدمين'])
        ->name('users.edit');
    Route::post('/delete/{id}', function ($id) {
        $user = User::findOrFail($id);
        $user->delete();
        $msg = "ثم حذف المستخدم بنجاح!";
        return back()->with('delete', $msg);
    })
        ->middleware(['permission:عرض المستخدمين'])
        ->name('users.delete');

    Route::post('/edit/{id}',function(Request $request , $id){
        $user = User::findOrFail($id);
        $storagepath = env('STORAGE_PATH');
        $request->validate([
            'email' => 'required|unique:users,email,' . $user->id . ',id',
            'rakm_howiya' => 'unique:users,rakm_howiya,' . $user->id . ',id',
        ]);
        $user->classes = json_encode($request->classes);
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
        if ($request->al_jadwal_dirassi) {
            $image    = $request->file('al_jadwal_dirassi');
            $filename = $user->id . '-al_jadwal_dirassi.' . $image->extension();
            Storage::disk('public')->putFileAs(
                'users/al_jadwel_dirassia',
                $image,
                $filename
            );
            $user->al_jadwal_dirassi = $storagepath . 'users/al_jadwel_dirassia/' . $filename;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password))
            $user->password = bcrypt($request->password);
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
        $user->school = $request->school;
        $user->field = $request->field;
        $user->save();
        foreach(Role::all() as $role){
            $user->removeRole($role->name);
        }
        $user->assignRole($request->role);
        $msg = "ثم تعديل البيانات بنجاح !";
        return back()->with('update', $msg);
    })
    ->middleware(['permission:عرض المستخدمين'])
    ->name('users.update');
});

Route::get('/create-user', function () {
    $schools = [
        'ابتدائية الأندلس',
        'ابتدائية الإمام عاصم لتحفيظ القرآن',
        'ابتدائية الجزيرة',
        'ابتدائية الحويلات',
        'ابتدائية الدانة',
        'ابتدائية الدفي',
        'ابتدائية الرياض',
        'ابتدائية الفناتير',
        'ابتدائية الفيحاء',
        'ابتدائية المرجان',
        'ابتدائية المطرفية',
        'ابتدائية الواحة',
        'ابتدائية جلمودة',
        'ابتدائية حراء',
        'ابتدائية نجد',
        'ابتدائية هجر',
        'ثانوية أم القرى - مقررات',
        'ثانوية الأحساء - مقررات',
        'ثانوية الدفي - مقررات',
        'ثانوية الرواد',
        'ثانوية العلا',
        'ثانوية نجد - مقررات',
        'متوسطة أم القرى',
        'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
        'متوسطة الخليج',
        'متوسطة الصديق',
        'متوسطة الفاروق',
        'متوسطة المروج',
        'متوسطة نجد'
    ];
    return view('users.create', [
        'title' => 'إنشاء مستخدم',
        'years' => Year::all(),
        'roles' => Role::all(),
        'schools' => $schools
    ]);
})->name('users.create');

Route::post('/users-create', function (Request $request) {
    $roles = $request->roles;
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->school = $request->school;
    $user->rakm_howiya = $request->rakm_howiya;
    $user->field = $request->field;
    $user->password = bcrypt(123456);
    $user->classes  = json_encode($request->classes);
    $user->save();
    $user->syncRoles($roles);
    return back()->with('create','ثم إنشاء المستخدم بنجاح !');
})->name('users.store');
