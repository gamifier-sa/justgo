<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GymDetailsResource extends JsonResource
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
            'address'=>$this->address,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'images'=>GymImageResource::collection($this->images),
            'packages'=> PackageGymResource::collection($this->packages),
            'description'=>$this->description,
            'Worktime'=> GymTimeResource::collection($this->times),
            'Reviews'=>ReviewResource::collection($this->reviews),
            'UserFavourites'=>$this->isUserFavourites,

        ];
    }
}
