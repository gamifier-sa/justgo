<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FavouriteGym;
use Illuminate\Http\Request;

class FavouriteGymController extends Controller
{
    public function Addfavourit(Request $request)
    {
        $data = $request->validate([
            'gym_id' => 'integer|exists:gyms,id'
        ]);

        $user_id = auth('api')->user()->id;

        $Favourites = FavouriteGym::where([
            ['user_id', '=', $user_id],
            ['gym_id', '=', $request->gym_id],
        ])->first();

        if (isset($Favourites)) {
            $Favourites->delete();
            return response()->success([
                'message' => __('admin.delete-from-favourit')
            ]);
        } else {
            $data['user_id'] = auth('api')->user()->id;
            $data['gym_id'] = $request->gym_id;

            FavouriteGym::create($data);

            return response()->success([
                'message' => __('admin.add-to-favourit')
            ]);
        }
    }
}
