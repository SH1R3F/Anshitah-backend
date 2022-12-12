<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleCollection;
use App\Services\RoleService;
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

    public function show(Role $role, RoleService $service): JsonResponse
    {

        // Handle permissions comparison
        $groups = $service->prepareRole($role);

        return response()->json([
            'role'   => RoleResource::make($role),
            'groups' => $groups
        ]);
    }

    public function update(RoleRequest $request, Role $role, RoleService $service)
    {

        // Handle updating role itself and its permissions
        $service->updateRole($request->validated(), $request->groups, $role);

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
