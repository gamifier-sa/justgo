<?php

namespace App\Http\Controllers\Api\Users\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ResetPasswordController extends Controller
{



    public function resetUserPassword(Request $request)
    {

        $request->validate($this->rules());
        $user = User::where('phone', $request->phone)
        ->orWhere('email', $request->phone)
        ->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->success([
                'message' => __('admin.your_password_had_been_reset')
            ]);
        }
    }

    protected function sendResetResponse()
    {
        return response()->success([
            'message' => __('admin.your_password_had_been_reset')
        ]);
    }





    protected function rules()
    {
        return [
            'phone' => 'required',
            'password' => 'required|confirmed|min:6|max:60',
        ];
    }

}
