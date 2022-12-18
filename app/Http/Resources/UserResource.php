<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{


    public static $wrap = 'user';


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'avatar' => $this->when($this->avatar, url($this->avatar), null),
            'milaf_howiya' => $this->when($this->milaf_howiya, url($this->milaf_howiya), null),
            'milaf_wadifi' => $this->when($this->milaf_wadifi, url($this->milaf_wadifi), null),
            'al_jadwal_dirassi' => $this->when($this->al_jadwal_dirassi, url($this->al_jadwal_dirassi), null),
            'name' => $this->name,
            'email' => $this->email,
            'rakm_howiya' => $this->rakm_howiya,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'university' => $this->university,
            'school' => $this->school,
            'field' => $this->field,
            'classes' => $this->when(is_array($this->classes), $this->classes, json_decode($this->classes)),
            'takhasos' => $this->takhasos,
            'date_graduation' => $this->date_graduation,
            'date_job' => $this->date_job,
            'current_job' => $this->current_job,
            'rakm_wadifi' => $this->rakm_wadifi,
            'date_birth'   => $this->date_birth,
            'date_birth'   => $this->date_birth,
            'role'         => $this->when($this->role, $this->role, $this->whenLoaded('roles', $this->roles()->first()->name)),
            'points_sum'   => $this->when($this->points_sum_point, intval($this->points_sum_point), 0),
        ];
    }
}
