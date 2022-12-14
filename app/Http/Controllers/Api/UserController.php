<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Year;
use App\Actions\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ImportService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{


    public function stats(): JsonResponse
    {
        return response()->json([
            'admins'   => User::whereHas('roles', fn ($query) => $query->where('name', 'مدير'))->count(),
            'teachers' => User::whereHas('roles', fn ($query) => $query->where('name', 'معلم'))->count(),
            'pioneers' => User::whereHas('roles', fn ($query) => $query->where('name', 'رائد نشاط'))->count(),
            'students' => User::whereHas('roles', fn ($query) => $query->where('name', 'طالب'))->count(),
            'roles'    => Role::orderBy('id')->pluck('name')
        ]);
    }

    public function import(Request $request, $type, ImportService $service)
    {
        $request->validate(['file' => 'required|file']);

        $service->import($type, $request->file);

        return response()->noContent(Response::HTTP_CREATED);
    }


    public function index(Request $request): JsonResource
    {
        // Sorry for this non-very readable code.
        // This supposed to fetch users with their roles ordered by role id with pagination.
        // Why not eloquent-way? Eloquent can't group by a many-to-many relationship column. and sortBy will affect performance.
        $users = User::select(['users.*', 'roles.name AS role'])
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->filter($request)
            ->search($request, 'users.name')
            ->orderBy('roles.id')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return UserCollection::make($users);
    }

    public function store(UserRequest $request): Response
    {
        $user = User::create($request->validated() + ['password' => Hash::make($request->password)]);
        $user->syncRoles(Role::where('name', $request->role)->first());
        return response()->noContent(Response::HTTP_CREATED); // 201
    }

    public function show(User $user): JsonResponse
    {

        $roles   = Role::orderBy('id')->pluck('name');
        $classes = [];
        Year::all(['id', 'name', 'classes'])
            ->each(function ($year) use (&$classes) { // Pass it by reference so it can modify it.
                foreach (json_decode($year->classes) as $class) {
                    array_push($classes, [
                        'label' => "{$year->name} / {$class}", // الصف الاول / 1
                        'value' => "{$year->id}_{$class}" // id_class
                    ]);
                }
            });

        return response()->json([
            'roles' => $roles,
            'user' => UserResource::make($user->load('roles')),
            'classes' => $classes
        ]);
    }

    public function update(UserRequest $request, User $user, UpdateUser $action): JsonResource
    {
        // Update user
        $action->handle($user, $request);
        return UserResource::make($user);
    }

    public function destroy(User $user): Response
    {
        // Delete the user
        $user->delete();

        // Delete his files

        // Response
        return response()->noContent(Response::HTTP_OK); // 200
    }
}
