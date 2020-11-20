<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Time;
class TimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
            "day" => Time::$day[$this->day],
            "from" => date('H:i',strtotime($this->from)),
            "to"   => date('H:i',strtotime($this->to))
        ];
    }
}
