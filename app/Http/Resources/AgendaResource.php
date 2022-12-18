<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgendaResource extends JsonResource
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
            'date_begin' => $this->date_begin,
            'date_begin_formatted' => $this->date_begin->format('d / m / Y - H:i A'),
            'date_end' => $this->date_end,
            'date_end_formatted' => $this->date_end->format('d / m / Y - H:i A'),
        ];
    }
}
