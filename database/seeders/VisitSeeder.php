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
        Visit::create([
            'user_id'=>1,
            'gym_id'=>1,
            'visit_date'=>'2023-11-26 12:01:06'
        ]);
    }
}
