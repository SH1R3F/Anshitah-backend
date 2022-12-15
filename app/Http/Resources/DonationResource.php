<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'school' => $this->school,
            'saf' => $this->when(isset($this->saf), $this->saf),
            'fasle' => $this->when(isset($this->fasle), $this->fasle),
            'donation' => $this->when($this->file, asset($this->file), $this->path),
            'file' => asset($this->file),
            'path' => $this->path,
            'updated_at' => $this->updated_at,
            'active' => $this->when(isset($this->active), $this->active),
        ];
    }
}
