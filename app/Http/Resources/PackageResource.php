<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GymResource;
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
            'daily_price'=>$this->daily_price,
            'monthly_price'=>$this->monthly_price,
            'quarterly_price'=>$this->quarterly_price,
            'annual_price'=>$this->annual_price,
            'description'=>$this->description,
            'number_gyms'=>$this->gyms->count(),
            'gyms' => GymResource::collection($this->gym)
        ];
    }
}
