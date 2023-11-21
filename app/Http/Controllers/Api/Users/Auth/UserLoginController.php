<?php

namespace App\Http\Controllers\Api\Users\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Messaging\SmsGlobalService;
use App\Models\user;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Rules\EncodedImage;
use Illuminate\Validation\Rule;
use App\Services\UserConfirmation;
use Illuminate\Support\Facades\Artisan;

class UserLoginController extends Controller
{
    public function test() 
     {
        dd('asdas');
        return response()->json('asdsa');   
    }

    public function login(Request $request)
    {
        dd('asdda');
        $request->validate([
            'phone' => 'required',
            'password' => 'required|min:6|max:60',
            'device_token'=>'sometimes|nullable'

        ]);

       // $data = $this->getDataForLogin($request);
        if ($token = auth()->guard('api')->attempt(array_merge($request->phone, ['status' => 'active']))) {
            $user = Auth::guard('api')->user();
            $user->update(['device_token' => $request->device_token]);
            return response()->success([
                'token' => $token,
                'user' =>  new  UserResource($user)

            ]);
        } elseif ($token = auth('api')->attempt(array_merge($request->phone, ['status' => 'active']))) {
            $user = Auth::guard('api')->user();
            return response()->success([
                'user' =>  new  UserResource($user)

            ]);
        } elseif ($token = auth('api')->attempt(array_merge($request->phone, ['status' => 'notactive']))) {
            return response()->fail([
                'message' =>  __('admin.active_user'),
            ]);
        } else {
            return response()->fail([
                'message' =>   __('admin.wrong_username_password')
            ]);
        }
    }
    // public function getDataForLogin($request)
    // {
    //     if (is_numeric($request->get('email'))) {
    //         return ['phone' => $request->get('email'), 'password' => $request->password];
    //     } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
    //         return ['email' => $request->get('email'), 'password' => $request->password];
    //     }
    //     return [];
    // }


    public function updateToken(Request $request)
    {
        $validator = [
            'device_token' => 'required',
        ];
        $request->validate($validator);


        auth('user')->user()->update(['device_token' => $request->device_token]);
        return response()->success([
            'massage' => __('admin.updateTokenfirebase')

        ]);
    }
}
