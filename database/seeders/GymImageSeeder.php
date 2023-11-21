<?php

namespace Database\Seeders;

use App\Models\GymImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gymimages = [
            [
                'image' => 'image1.jpg',
                'gym_id' => 1
            ],
            [
                'image' => 'image2.jpg',
                'gym_id' => 1
            ],        
            [
                'image' => 'image3.jpg',
                'gym_id' => 1
            ],        
            [
                'image' => 'image4.jpg',
                'gym_id' => 1
            ],
        ];

        foreach($gymimages as $gymimage){
            GymImage::create($gymimage);
        }
    }
}
