<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notifications = [
            [
                'id'=>1,
                'title' => 'New gift',
                'data' => 'A new gift has been added'
            ], [
                'id'=>2,

                'title' => 'New Gym',
                'data' => 'A new Gym has been added'
            ]
        ];

        foreach($notifications as $notification){
            Notification::create($notification);
        }
    }
}
