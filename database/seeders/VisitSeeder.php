<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 8; $i++){
            $xRandom = rand(10, 100);
            for($x = 1; $x <= $xRandom; $x++){
                Visit::create([
                    'user_id'=>1,
                    'gym_id'=>rand(1,3),
                    'visit_date'=>'2023-'.$i.'-'.$x.' 12:01:06'
                ]);
            }
        }
        
    }
}
