<?php

namespace App\Http\Controllers\Api\Users\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ResetPasswordController extends Controller
{



    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:api');
    }

    public function resetUserPassword(Request $request)
    {
        $request->validate($this->rules());
        $user = User::where([['email', '=', $request->email], ['confirmation_code', '=', $request->confirmation_code]])->first();
        if ($user) {
            if (!$user->check_confirmation_code()) {

                return $this->sendResetExpiredResponse();
            }
            $user->password = bcrypt($request->password);
            $user->save();
            return $this->sendResetResponse();
        }
        return $this->sendResetFailedResponse();
    }

    protected function sendResetResponse()
    {
        return response()->success([
            'message' => __('admin.your_password_had_been_reset')
        ]);
    }

    protected function sendResetExpiredResponse()
    {
        return response()->success([
            'message' => __('admin.your_password_had_been_reset')
        ]);
        return response()->fail([
            'message' =>  __('admin.given_data_invalid'),
            'errors' => "['confirmation_code' =>" .' '. __('admin.confirmation_code_expired').''."]"
        ]);
    }

    protected function sendResetFailedResponse()
    {
        return response()->fail([
            'message' =>  __('admin.given_data_invalid'),
            'errors' => "['confirmation_code' =>" .' '. __('admin.wrong_confirmation_code').''."]"
        ]);
    }

    protected function rules()
    {
        return [
            'confirmation_code' => 'required',
            'email' => 'required|email|min:4|max:120|exists:users,email',
            'password' => 'required|confirmed|min:6|max:60',
        ];
    }
}
