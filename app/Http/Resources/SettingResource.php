<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'contact_us_p'=>$this->contact_us,
            'phone'=>$this->phone,
            'whatsapp_number'=>$this->whatsapp_number,
            'email'=>$this->email,
            'terms_conditions'=>$this->terms_conditions
        ];
    }
}
