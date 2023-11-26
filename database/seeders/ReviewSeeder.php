<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $reviews = [
            [
                'user_id' => 1,
                'gym_id' => 1,
                'rating' => 3.5,
                'comment' => 'very good gym',
                'visit_id' => null
            ],
            [
                'user_id' => 1,
                'gym_id' => null,
                'rating' => 5,
                'comment' => 'very good visit',
                'visit_id' => 1
            ]
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
