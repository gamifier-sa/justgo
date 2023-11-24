<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavouriteGymResource;
use App\Http\Resources\GymResource;
use App\Models\FavouriteGym;
use Illuminate\Http\Request;

class FavouriteGymController extends Controller
{

    function myfavorites()
    {
        $user_id = auth('api')->user()->id;
        $Favourites = FavouriteGym::with('gyms')->where('user_id', '=', $user_id)->get();

        // Iterate over each FavouriteGym to access the related gym
        $gyms = $Favourites->map(function ($favourite) {
            return $favourite->gyms;
        })->flatten();


        return response()->success([
            'gyms' => GymResource::collection($gyms),
        ]);

    }
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
