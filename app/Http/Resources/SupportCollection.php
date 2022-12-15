<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SupportCollection extends ResourceCollection
{

    public static $wrap = null;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
