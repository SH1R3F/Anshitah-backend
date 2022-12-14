<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class YearResource extends JsonResource
{

    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'number' => $this->number,
            'classes' => is_array($this->classes) ? $this->classes : json_decode($this->classes),
        ];
    }
}
