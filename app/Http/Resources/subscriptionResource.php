<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'name'=>$this->package->name,
            'icon'=>getImage('Packages',$this->package->icon),
            'visits_no'=>$this->package->visits_no,
            'bg_color'=>$this->package->bg_color,
            'price'=>$this->price,
            'end_date'=>$this->EndDate,
            'gyms'=>SubscriptionGymResource::collection($this->package->gymssubcription),


        ];
    }
}
