<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DonationCollection extends ResourceCollection
{
    public static $wrap = 'donates';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
