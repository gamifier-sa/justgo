<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GymTimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'Saturday'=>$this->Saturday,
            'Sunday'=>$this->Sunday,
            'Monday'=>$this->Monday,
            'Tuesday'=>$this->Tuesday,
            'Wednesday'=>$this->Wednesday,
            'Thursday'=>$this->Thursday,
            'Friday'=>$this->Friday,
            'shift'=>$this->shift,
            'type'=>$this->type
        ];
    }
}
