<?php

namespace App\Http\Controllers\website\user\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VerifyController extends Controller
{


    public function VerifyupdatedEmail($token = null)
    {
        if($token == null) {

    		session()->flash('message', 'Invalid Login attempt');

    		return redirect()->route('login');

    	}

       $user = User::where('email_verification_token',$token)->first();

       if($user == null ){

       	session()->flash('message', 'Invalid Login attempt');

        return redirect()->route('user.login');

       }


       $user->update([

        'email_verified' => 1,
        'email_verified_at' => Carbon::now(),
        'email_verification_token' => '',
        'email' =>session('email')


       ]);
       session()->forget('email');

       	session()->flash('message', 'Your account is activated, you can log in now');

        return redirect()->route('home');
    }
}
