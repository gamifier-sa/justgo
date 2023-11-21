<?php

namespace Database\Seeders;

use App\Models\GymTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $times = [
            [
                'Saturday' => '09:00:00',
                'Sunday' => '09:00:00',
                'Monday' => '09:00:00',
                'Tuesday' => '09:00:00',
                'Wednesday' => '09:00:00',
                'Thursday' => '09:00:00',
                'Friday' => '09:00:00',
                'shift' => 1,
                'type' => 'open',
                'gym_id' => 1
            ], [
                'Saturday' => '10:00:00',
                'Sunday' => '10:00:00',
                'Monday' => '10:00:00',
                'Tuesday' => '10:00:00',
                'Wednesday' => '10:00:00',
                'Thursday' => '10:00:00',
                'Friday' => '10:00:00',
                'shift' => 1,
                'type' => 'open',
                'gym_id' => 1
            ], [
                'Saturday' => '11:00:00',
                'Sunday' => '11:00:00',
                'Monday' => '11:00:00',
                'Tuesday' =>'11:00:00',
                'Wednesday' => '11:00:00',
                'Thursday' => '11:00:00',
                'Friday' => '11:00:00',
                'shift' => 2,
                'type' => 'open',
                'gym_id' => 1
            ], [
                'Saturday' => '09:00:00',
                'Sunday' => '09:00:00',
                'Monday' => '09:00:00',
                'Tuesday' => '09:00:00',
                'Wednesday' => '09:00:00',
                'Thursday' => '09:00:00',
                'Friday' => '09:00:00',
                'shift' => 2,
                'type' => 'open',
                'gym_id' => 1
            ]
        ];
        foreach($times as $time){
            GymTime::create($time);
        }
    }
}
