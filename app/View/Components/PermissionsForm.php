<?php

namespace App\View\Components;

use App\Models\GroupePermission;
use Illuminate\View\Component;

class PermissionsForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.permissions-form',[
            'groupe_permissions' => GroupePermission::all()
        ]);
    }
}
