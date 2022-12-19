<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
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
            'q1' => $this->q1,
            'q2' => $this->q2,
            'q3' => $this->q3,
            'q4' => $this->q4,
            'q5' => $this->q5,
            'user_id' => $this->user_id,
            'username' => $this->whenLoaded(
                'user',
                $this->when($this->user, $this->user->name)
            ),
            'field' => $this->whenLoaded(
                'user',
                $this->when($this->user, $this->user->field)
            ),
            'date' => $this->date,
            'date_formatted' => $this->date->format('d / m / Y'),
        ];
    }
}
