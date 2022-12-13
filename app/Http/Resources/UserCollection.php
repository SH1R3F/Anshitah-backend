<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{


    public static $wrap = 'users';


    public function toArray($request)
    {
        return UserResource::collection($this->collection);
    }
}
