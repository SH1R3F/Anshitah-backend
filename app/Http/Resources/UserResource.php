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
            'avatar' => url($this->avatar),
            'milaf_howiya' => url($this->milaf_howiya),
            'milaf_wadifi' => url($this->milaf_wadifi),
            'name' => $this->name,
            'email' => $this->email,
            'rakm_howiya' => $this->rakm_howiya,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'university' => $this->university,
            'takhasos' => $this->takhasos,
            'date_graduation' => $this->date_graduation,
            'date_job' => $this->date_job,
            'current_job' => $this->current_job,
            'rakm_wadifi' => $this->rakm_wadifi,
            'date_birth' => $this->date_birth,
            // $this->merge(parent::toArray($request))
        ];
    }
}
