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
            $times = $this;
            if ($times->isNotEmpty()) {
                $transformedData[] = [
                    $day => $times->groupBy('shift')->map(function ($timeGroup) use($day, $index){
                        return [
                            'shift' => $timeGroup->first()->shift,
                            'day' => $day,
                            'open_at' => $timeGroup->where('type','open')->first()? $timeGroup->where('type','open')->first()->$day : '00:00:00',
                            'close_at' => $timeGroup->where('type','closed')->first() ? $timeGroup->where('type','closed')->first()->$day : '23:59:59'
                        ];
                    })->values()->all(),
                ];


                
            }
        }

        return $transformedData;
    }
}