<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\GroupePermission;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleController extends Controller
{


    public function index(Request $request): JsonResource
    {
        $roles = Role::query()
            ->when($request->q, fn ($builder) => $builder->where('name', 'like', "%{$request->q}%"))
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['id', 'name'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return RoleCollection::make($roles);
    }

    public function show(Role $role): JsonResponse
    {

        $role   = $role->load('permissions');
        $groups = GroupePermission::orderBy('id', 'ASC')->get(['id', 'name']);

        // Generated a checked field on each group that is true if current role has all its permissions.
        $groups = $groups->load('permissions')->map(function ($group) use ($role) {
            $checked = !array_diff($group->permissions->pluck('name')->toArray(), $role->permissions->pluck('name')->toArray());
            return [
                'id' => $group->id,
                'name' => $group->name,
                'checked' => $checked
            ];
        });

        return response()->json([
            'role'   => RoleResource::make($role),
            'groups' => $groups
        ]);
    }

    public function update(RoleRequest $request, Role $role)
    {

        // These role names can't be updated.
        if (!in_array($role->name, ['مدير', 'وكيل', 'معلم'])) {
            $role->update($request->validated());
        }

        // Update role permissions
        $permissions = [];
        if (count($request->groups)) {
            foreach ($request->groups as $group) {
                $grp = GroupePermission::find($group['id'])->load('permissions');
                if ($group['checked']) {
                    $permissions = array_merge($permissions, $grp->permissions->pluck('id')->toArray());
                }
            }
        }
        $role->syncPermissions($permissions);

        return response('', Response::HTTP_OK);
    }

    public function store(RoleRequest $request)
    {
        Role::create([
            'name' => $request->name
        ]);

        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Role $role)
    {
        // These roles can't be deleted.
        if (in_array($role->id, ['مدير', 'وكيل', 'معلم'])) {
            return response()->json([
                'message' => 'لا يمكن حذف هذه المجموعة'
            ], Response::HTTP_UNPROCESSABLE_ENTITY); // 422
        }

        // Delete the role
        $role->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
