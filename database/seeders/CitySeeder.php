<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'en' => [
                    'name' => 'Riyadh',
                ],
                'ar' => [
                    'name' => 'الرياض',

                ],
            ], [
                'en' => [
                    'name' => 'Jeddah',
                ],
                'ar' => [
                    'name' => 'جدة',
                ],
            ], [
                'en' => [
                    'name' => 'Makkah',
                ],
                'ar' => [
                    'name' => 'مكة المكرمة',

                ],
            ], [
                'en' => [
                    'name' => 'AL Madinah AL Munawwarah',
                ],
                'ar' => [
                    'name' => 'المدينة المنورة',

                ],
            ], [

                'en' => [
                    'name' => 'Dammam',
                ],
                'ar' => [
                    'name' => 'الدمام',

                ],
            ], [
                'en' => [
                    'name' => 'Al-Hofuf',
                ],
                'ar' => [
                    'name' => 'الهفوف',

                ],
            ], [
                'en' => [
                    'name' => 'Hafar Al-Batin',
                ],
                'ar' => [
                    'name' => 'حفر الباطن',

                ],
            ], [
                'en' => [
                    'name' => 'Hilla',
                ],
                'ar' => [
                    'name' => 'الحلة',

                ],
            ], [
                'en' => [
                    'name' => 'Taif',
                ],
                'ar' => [
                    'name' => 'الطائف',

                ],
            ], [
                'en' => [
                    'name' => 'Tabuk',
                ],
                'ar' => [
                    'name' => 'تبوك',

                ],
            ], [
                'en' => [
                    'name' => 'Qatif',
                ],
                'ar' => [
                    'name' => 'القطيف',

                ],
            ], [
                'en' => [
                    'name' => 'Buraidah',
                ],
                'ar' => [
                    'name' => 'بريدة',

                ],

            ], [
                'en' => [
                    'name' => 'Jubail',
                ],
                'ar' => [
                    'name' => 'الجبيل',

                ],
            ], [
                'en' => [
                    'name' => 'Yashid',
                ],
                'ar' => [
                    'name' => 'يشيد',

                ],

            ], [
                'en' => [
                    'name' => 'Al Kharj',
                ],
                'ar' => [
                    'name' => 'الخرج',

                ],

            ], [
                'en' => [
                    'name' => 'Qunfudhah',
                ],
                'ar' => [
                    'name' => 'القنفذة',

                ],
            ], [

                'en' => [
                    'name' => 'Al Mubarraz',
                ],
                'ar' => [
                    'name' => 'المبرز',

                ],
            ], [

                'en' => [
                    'name' => 'Yanbu',
                ],
                'ar' => [
                    'name' => 'ينبع',

                ],
            ], [

                'en' => [
                    'name' => 'Sakaka',
                ],
                'ar' => [
                    'name' => 'سكاكا',

                ],
            ], [

                'en' => [
                    'name' => 'Abha',
                ],
                'ar' => [
                    'name' => 'أبها',

                ],
            ], [

                'en' => [
                    'name' => 'Sabya',
                ],
                'ar' => [
                    'name' => 'صبيا',

                ],
            ], [

                'en' => [
                    'name' => 'Al Khobar',
                ],
                'ar' => [
                    'name' => 'الخبر',

                ],
            ], [

                'en' => [
                    'name' => 'Bisha Castle',
                ],
                'ar' => [
                    'name' => 'قلعة بيشة',

                ],

            ], [

                'en' => [
                    'name' => 'Unayzah',
                ],
                'ar' => [
                    'name' => 'عنيزة',

                ],
            ], [

                'en' => [
                    'name' => 'Ras Tanura',
                ],
                'ar' => [
                    'name' => 'رأس تنورة',

                ],
            ], [

                'en' => [
                    'name' => 'Hawiyah',
                ],
                'ar' => [
                    'name' => 'الحوية',

                ],
            ], [

                'en' => [
                    'name' => 'Qurayyat',
                ],
                'ar' => [
                    'name' => 'القريات',

                ],
            ], [

                'en' => [
                    'name' => 'Al Eras',
                ],
                'ar' => [
                    'name' => 'ع الرأس',

                ],
            ], [

                'en' => [
                    'name' => 'Jazan',
                ],
                'ar' => [
                    'name' => 'جازان',

                ],

            ], [

                'en' => [
                    'name' => 'Zulfi',
                ],
                'ar' => [
                    'name' => 'الزلفي',

                ],
            ], [

                'en' => [
                    'name' => 'Saihat',
                ],
                'ar' => [
                    'name' => 'سيهات',

                ],
            ], [

                'en' => [
                    'name' => 'Haradhar',
                ],
                'ar' => [
                    'name' => 'حراض',

                ],
            ], [

                'en' => [
                    'name' => 'Al-Ahad Al-Musarrhah',
                ],
                'ar' => [
                    'name' => 'الأحد المسارحه',

                ],

            ]
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
