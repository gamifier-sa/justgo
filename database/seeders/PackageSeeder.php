<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = []; 

        $pakages[] = [
            'en' => [
                'name' => 'Silver',
                'description' => 'Silver'
            ],
            'ar' => [
                'name' => 'الفضية',
                'description' => 'الفضية'
            ],
            'icon' => 'silver.png',
            'visits_no' => 10,
            'bg_color' => '#E8E8E8',
            'daily_price' => 1,
            'monthly_price' => 10,
            'quarterly_price' => 100,
            'midterm_price' => 1000,
            'annual_price' => 2000
        ];

        $pakages[] = [
            'en' => [
                'name' => 'Gold',
                'description' => 'gold'
            ],
            'ar' => [
                'name' => 'الذهبية',
                'description' => 'الذهبية'
            ],
            'icon' => 'golden.png',
            'visits_no' => 20,
            'bg_color' => '#E0AF00',
            'daily_price' => 2,
            'monthly_price' => 20,
            'quarterly_price' => 200,
            'midterm_price' => 2000,
            'annual_price' => 4000,
        ];

        $pakages[] = [
            'en' => [
                'name' => 'Diamond',
                'description' => 'Diamond'
            ],
            'ar' => [
                'name' => 'الماسية',
                'description' => 'الماسية'
            ],
            'icon' => 'dimaond.png',
            'visits_no' => 30,
            'bg_color' => '#BD80E1',
            'daily_price' => 3,
            'monthly_price' => 30,
            'quarterly_price' => 300,
            'midterm_price' => 3000,
            'annual_price' => 6000,
        ];

        foreach($pakages as $pakage){
            Package::create($pakage);
        }
    }
}
