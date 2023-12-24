<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <=8 ; $i++) {
            $xRandom = rand(10, 100);
            for ($x = 1; $x <= $xRandom; $x++) {
                ContactUs::create([
                    'status'=>'not_answered',
                    'user_id' => 1,
                    'gym_id' => rand(1, 3),
                    'subject' =>'subject-'.rand(1,28),
                    'message' =>' new message-'.rand(1,28),

                ]);
            }
        }
    }
}
