<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{

    public static $wrap = 'msg';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ticket_id' => $this->ticket_id,
            'body' => $this->body,
            'attachment' => $this->when($this->attachment, url($this->attachment), $this->attachment),
            'user_id' => $this->user_id,
            'support_id' => $this->support_id,
            'sender' => $this->sender,
            'updated_at' => Carbon::parse($this->updated_at),
        ];
    }
}
