<?php

namespace App\Http\Controllers\Api\Users\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
  

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric',
            'password' => 'required|min:6|max:60'

        ]);
       $data = $this->getDataForLogin($request);

        if ($token = auth('api')->attempt(array_merge($data, ['status' => 'active']))) {

            $user = Auth::guard('api')->user();
            return response()->success([
                'token' => $token,
                'user' =>  new  UserResource($user)

            ]);


         }elseif($token = auth('api')->attempt(array_merge($data, ['status' => 'inactive']))){
            $user = Auth::guard('api')->user();
            $usersend=User::where(["phone"=>$request->phone])->first();
            // $usersend->send_reset_code();

            return response()->success([
                'user' =>  new  UserResource($user)

            ]);

        }elseif($token = auth('api')->attempt(array_merge($data, ['admin_active' => 0]))){
            return response()->fail([
                'message' =>  __('admin.active_admin'),
            ]);

        }else{
            return response()->fail([
                'message' =>   __('admin.wrong_username_password')
            ]);

        }
    }
    public function getDataForLogin ($request) {
        if(is_numeric($request->get('phone'))){
            return ['phone' => $request->get('phone'),'password' => $request->password];

        } elseif (filter_var($request->get('phone'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('phone'),'password' => $request->password];
        }
        return [];
    }
    
  


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
