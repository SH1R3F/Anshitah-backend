<?php


namespace App\Services;

use App\Models\GroupePermission;

class RoleService
{


    public function prepareRole($role)
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
        return $groups;
    }

    public function updateRole($data, $groups, $role)
    {

        // These role names can't be updated.
        if (!in_array($role->name, ['مدير', 'وكيل', 'معلم'])) {
            $role->update($data);
        }

        // Update role permissions
        $permissions = [];
        if (count($groups)) {
            foreach ($groups as $group) {
                $grp = GroupePermission::find($group['id'])->load('permissions');
                if ($group['checked']) {
                    $permissions = array_merge($permissions, $grp->permissions->pluck('id')->toArray());
                }
            }
        }
        $role->syncPermissions($permissions);
    }
}
