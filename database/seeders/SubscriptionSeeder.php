<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        for ($i = 1; $i <= 8; $i++) {
            $xRandom = rand(10, 100);
            for ($x = 1; $x <= $xRandom; $x++) {
                Subscription::create([
                    'user_id' => 1,
                    'package_id' => rand(1, 3),
                    'StartDate' =>'2023-'.rand(1,12).'-'.rand(1,28),
                    'EndDate' =>'2024-'.rand(1,12).'-'.rand(1,28),
                    'price'=>rand(10, 100),
                    'type_subscription'=>'month'
                ]);
            }
        }
    }
}
