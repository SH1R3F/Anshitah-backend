<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalResource extends JsonResource
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
            'date' => $this->date,
            'date_formatted' => $this->date->format('d / m / Y - H:i A'),
            'year' => $this->year,
            'temperature' => $this->temperature,
            'sugar' => $this->sugar,
            'complaint' => $this->complaint,
            'procedure' => $this->procedure,
            'status' => $this->status,
        ];
    }
}
