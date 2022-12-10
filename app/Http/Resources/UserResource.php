<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'avatar'       => url($this->avatar),
            'milaf_howiya' => url($this->milaf_howiya),
            'milaf_wadifi' => url($this->milaf_wadifi),

            $this->merge(parent::toArray($request))
        ];
    }
}
