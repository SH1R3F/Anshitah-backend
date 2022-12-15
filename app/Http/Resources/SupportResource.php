<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'rolename' => $this->rolename,
            'status' => $this->status,
            'title' => $this->title,
            'userid' => $this->userid,
            'avatar' => $this->when($this->avatar, url($this->avatar), asset('media/users/default.jpg')),
            'updated_at' => Carbon::parse($this->updated_at)->diffForHumans(),
        ];
    }
}
