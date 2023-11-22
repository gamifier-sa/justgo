<?php

namespace Database\Seeders;

use App\Models\PackageGym;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageGymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PackageGyms = [
            [
                'gym_id'=>1,
                'package_id'=>1
            ], [
                'gym_id'=>1,
                'package_id'=>2
            ], [
                'gym_id'=>1,
                'package_id'=>3
            ], [
                'gym_id'=>2,
                'package_id'=>1
            ], [
                'gym_id'=>3,
                'package_id'=>2
            ],
        ];

        foreach($PackageGyms as $PackageGym){
            PackageGym::create($PackageGym);
        }

    }
}
