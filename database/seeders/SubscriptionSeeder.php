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
        Subscription::create([
            'package_id'=>1,
            'user_id'=>1,
            'StartDate'=>'2023-11-26',
            'EndDate'=>'2023-12-26',
            'price'=>10,
            'type_subscription'=>'month'

        ]);
    }
}
