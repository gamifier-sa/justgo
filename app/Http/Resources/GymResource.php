<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GymResource extends JsonResource
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
            'cover_image'=>getImage('Gyms',$this->cover_image),
            'numbers_package'=> $this->packages->count() == 1 ? $this->packages->first()->package->name :  $this->packages->count()
        ];
    }
}
