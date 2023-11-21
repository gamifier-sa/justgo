<?php

namespace App\Http\Controllers\Api\Users\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register(RegisterRequest $request) 
    {
        $data = $request->validated();
        $data['status']= 'active';
        $data['password'] = bcrypt($request->password);

        if (isset($data['profile_image'])) {
            $data['profile_image']  = storeImage('Users', $data['profile_image']);
        }
        $user=User::create($data);
        $tokenResult = $user->createToken($user);
        $token = $tokenResult->plainTextToken;
        return response()->success([
            'user' =>  new  UserResource($user),
            'accessToken'=> $token,
        ]);

    }
}
