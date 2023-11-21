<?php

namespace App\Http\Controllers\Api\Users\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Messaging\SmsGlobalService;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Tymon\JWTAuth\Facades\JWTAuth;

class ForgotPasswordController extends Controller
{




    public function forgotpassword(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);
        $user = User::where('phone', $request->phone)
            ->orWhere('email', $request->phone)
            ->first();
        if ($user) {
            return response()->success([
                'user' =>  new  UserResource($user)

            ]);
        } else {
            return response()->fail([
                'message' =>   __('admin.wrong_user_account')
            ]);
        }
    }
}
