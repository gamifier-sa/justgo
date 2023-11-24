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
            'cover_image'=>getImage('Gyms',$this->cover_image),
            'logo'=>getImage('Gyms',$this->logo),
            'images'=>GymImageResource::collection($this->images),
            'packages'=> PackageResource::collection($this->packagesGym),
            'description'=>$this->description,
            'Worktime'=> GymTimeResource::collection($this->times),
            'Reviews'=>ReviewResource::collection($this->reviews),
            'UserFavourites'=>$this->isUserFavourites,
            'numbers_package'=> $this->packages->count() == 1 ? $this->packages->first()->package->name :  $this->packages->count(),
            'AvgReviews'=>$this->AvgReviews,

        ];
    }
}
