<?php

namespace Database\Seeders;

use App\Models\GiftUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GiftUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gifts = [
            [
                'number_days' => 5,
                'gift_card_image' => 'giftcard1.jpg'
            ], [
                'number_days' => 4,
                'gift_card_image' => 'giftcard2.jpg'
            ], [
                'number_days' => 6,
                'gift_card_image' => 'giftcard3.jpg'
            ]

        ];
        foreach($gifts as $gift){
            GiftUser::create($gift);
        }
    }
}
