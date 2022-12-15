<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatCollection extends ResourceCollection
{

    public static $wrap = 'chat';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
