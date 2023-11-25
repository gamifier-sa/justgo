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
        $days = [
            'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'
        ];

        $transformedData = [];

        foreach ($days as $index => $day) {
            $times = $this->get();
            if ($times->isNotEmpty()) {
                $transformedData[] = [
                    $day => $times->groupBy('shift')->map(function ($timeGroup) use($day, $index){
                        return [
                            'index' => $index,
                            'shift' => $timeGroup->first()->shift,
                            'open_at' => $timeGroup->where('type','open')->first()->$day,
                            'close_at' => $timeGroup->where('type','closed')->first()->$day
                        ];
                    })->values()->all(),
                ];


                
            }
        }

        return $transformedData;
    }
}