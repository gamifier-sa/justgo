<?php

namespace App\Http\Controllers\Api\users\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\SubscriptionResource;
class UserProfileController extends Controller
{
    public function myprofile()
    {
        $user = Auth::guard('api')->user();
        return response()->success([
            'user' =>  new  UserResource($user)
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = Auth::guard('api')->user();
        $data = $request->validated();

        if (isset($data['profile_image'])) {
            $data['profile_image'] = storeImage('Users', $data['profile_image']) ?? $user->profile_image;
            deleteImage('Users', $user->profile_image);
        }
        $user->update($data);

        return response()->success([
            'user' => new UserResource($user)
        ]);
    }


    public function mypackage()
    {
        $user = Auth::guard('api')->user();
        return response()->success([
            'package' =>  new  SubscriptionResource($user->subscription)
        ]);
    }


}
