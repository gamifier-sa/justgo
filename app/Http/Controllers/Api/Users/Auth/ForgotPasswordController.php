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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:api');
    }

    public function sendResetPasswordCode(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email'
        ]);
        $user = User::where('email', $request->email)->first();

        $user->send_reset_code();
        return response()->success([
            'message' => trans('admin.your_new_password_had_been_send')

        ]);
    }

    public function checkConfirmationCode(Request $request)
    {
        $request->validate([
            'confirmation_code' => 'required|digits:4',
            'email' => 'required|exists:users,email'
        ]);
        $user = User::where([
            ['email', '=', $request->email],
            ['confirmation_code', '=', $request->confirmation_code],
        ])->first();



        if (!$user ||  $user->is_expired_code()) {
            return response()->fail([
                'message' =>  __('admin.given_data_invalid'),
                'errors' => ['confirmation_code' => __('admin.wrong_confirmation_code')]
            ]);
        } else {

            $user->update([
                'active' => 1
            ]);
            $token = JWTAuth::fromUser($user);

            return response()->success([
                'token' => $token,
                'user' =>  new  UserResource($user),


            ]);
        }
    }
}
