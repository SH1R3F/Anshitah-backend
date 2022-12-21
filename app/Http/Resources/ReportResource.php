<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'number' => $this->number,
            'school' => $this->school,
            'field' => $this->field,
            'value' => $this->value,
            'mocharikin' => $this->mocharikin,
            'monadimin' => $this->monadimin,
            'jomhor' => $this->jomhor,
            'total_mocharikin' => $this->total_mocharikin,
            'executed' => is_array($this->executed) ? $this->executed : json_decode($this->executed),
            'img1' => collect($this->img1)->map(fn ($img) => [
                'id' => $img['id'],
                'file' => url($img['file'])
            ]),
            'img2' => collect($this->img2)->map(fn ($img) => [
                'id' => $img['id'],
                'file' => url($img['file'])
            ]),
            'img3' => collect($this->img3)->map(fn ($img) => [
                'id' => $img['id'],
                'file' => url($img['file'])
            ]),
            'img4' => collect($this->img4)->map(fn ($img) => [
                'id' => $img['id'],
                'file' => url($img['file'])
            ]),
            'created_at_formatted' => $this->created_at->format('d / m / Y'),
            'evaluation_total' => $this->whenLoaded('evaluation', $this->evaluation?->total),
        ];
    }
}
