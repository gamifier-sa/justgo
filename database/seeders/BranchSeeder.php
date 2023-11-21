<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branchs = [
            [
                'address'=>'Abha',
                'lat'=>28.446959,
                'lng'=>45.948944,
                'gym_id'=>1
            ],[
                'address'=>'Al-Abwa',
                'lat'=>21.492500,
                'lng'=>39.177570,
                'gym_id'=>1

            ],[
                'address'=>'Dammam',
                'lat'=>16.909683,
                'lng'=>42.567902,
                'gym_id'=>1

            ],
        ];

        foreach($branchs as $branch){
            Branch::create($branch);
        }
    }
}
