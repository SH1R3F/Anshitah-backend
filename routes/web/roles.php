<?php

use App\Models\GroupePermission;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;


Route::get('/permissions',function(){
    return view('permissions.index',[
        'title' => 'عرض كل الصلاحيات',
        // 'permissions' => Permission::all()
        'groupe_permissions' => GroupePermission::all()
    ]);
})->name('permissions');
Route::prefix('/roles')->group(function(){
    Route::get('/',function(){
        return view('roles.index',[
            'title' => 'إدارة المجموعات',
            'roles' => Role::all()
        ]);
    })->name('roles');
    Route::get('/create',function(){
        return view('roles.create',[
            'title' => 'إنشاء مجموعة',
            'permissions' => Permission::all()
        ]);
    })->name('roles.create');
    Route::post('/create',function(Request $request){
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);
        return back()->with('create','ثم إنشاء المجموعة بنجاح !');
    })->name('roles.store');

    // Edit Group Roles
    Route::get('/edit/{id}',function($id){
        $role = Role::findOrFail($id);
        $array = [];
        foreach($role->permissions as $permission){
            $array[] = $permission->name;
        }
        return view('roles.edit',[
            'title' => 'تعديل مجموعة',
            'role' => $role,
            'permissions' => Permission::all(),
            'role_permissions' => $array
        ]);
    })->name('roles.edit');

    Route::post('/edit/{id}',function(Request $request , $id){
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $permissions = Permission::all();
        foreach($permissions as $permission){
            $role->revokePermissionTo($permission->name);
        }
        foreach($permissions as $permission){
            if(in_array($permission->name , $request->permissions)){
                $role->givePermissionTo($permission->name);
            }
        }
        return back()->with('update','ثم تعديل المجموعة بنجاح !');
    })->name('roles.update');
    Route::post('/delete/{id}',function(Request $request , $id){
        // dd($request->permissions);
        $role = Role::findOrFail($id);
        $role->delete();
        return back()->with('delete','ثم حذف المجموعة بنجاح !');
    })->name('roles.delete');
});

Route::get('/permissions/revoke/{name}/{folder}',function($name,$folder){
    /**
     * users has permission
     */
    $usersWith    = User::permission($name)->get();
    /**
     * Witout permission
     */
    $usersWithout = User::whereNotIn('id', Arr::pluck($usersWith,'id'))->get();
    return view('permissions.revoke',[
        'title' => " إلغاء الصلاحية من $folder",
        'usersWith' => $usersWith,
        'usersWithout' => $usersWithout,
        'name' => $name,
    ]);
})->name('permissions.revoke');
Route::post('/permissions/revoke/{name}',function(Request $request , $name){
    // dd($request->users);
    $users = User::all();
    foreach($users as $user){
        if(in_array($user->id,$request->users ?? [])){
            $user->givePermissionTo($name);
        }else{
            $user->revokePermissionTo($name);
        }
    }
    return back()->with('update','ثم حذف الصلاحيات من المعلمين بنجاح!');
})->name('permissions.revoke.post');
