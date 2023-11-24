<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=>$this->name,
            'profile_image'=>getImage('Users',$this->profile_image),
            'email'=>$this->email,
            'phone'=>$this->phone,
            'whatsapp_number'=>$this->whatsapp_number,
            'gender'=>$this->gender,
            'status'=>$this->status,
            'subscription'=>new SubscriptionResource($this->subscription)
        ];
    }
}
