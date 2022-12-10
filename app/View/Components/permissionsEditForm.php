<?php

namespace App\View\Components;

use App\Models\GroupePermission;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class permissionsEditForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $role_id;
    public function __construct($id)
    {
        $this->role_id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $role = Role::findOrFail($this->role_id);
        $array = [];
        foreach($role->permissions as $permission){
            $array[] = $permission->name;
        }
        return view('components.permissions-edit-form',[
            'groupe_permissions' => GroupePermission::all(),
            'role_permissions' => $array
        ]);
    }
}
