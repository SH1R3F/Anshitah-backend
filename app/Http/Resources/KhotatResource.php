<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KhotatResource extends JsonResource
{

    public static $wrap = 'khotat';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'schools' => $this->schools,
            'file' => url($this->file),
            'updated_at' => $this->updated_at,
        ];
    }
}
