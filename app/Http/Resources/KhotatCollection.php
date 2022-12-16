<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class KhotatCollection extends ResourceCollection
{

    public static $wrap = 'khotat';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
