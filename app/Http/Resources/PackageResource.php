<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'icon'=>getImage('Packages',$this->icon),
            'name'=>$this->name,
            'bg_color'=>$this->bg_color,
            'monthly_price'=>$this->monthly_price,
            'description'=>$this->description

        ];
    }
}
