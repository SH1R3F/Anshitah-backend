<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class YearCollection extends ResourceCollection
{

    public static $wrap = 'years';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
