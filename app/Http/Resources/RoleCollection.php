<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleCollection extends ResourceCollection
{


    public static $wrap = 'roles';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
