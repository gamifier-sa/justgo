<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {

        return [
            'id'=>$this->id,
            'day'=>__('admin.'.Carbon::parse($this->visit_date)->format('l')),
            'gym_name'=>$this->gym->name,
            'package'=>new PackageResource($this->user->subscription->package),
        ];
    }
}
