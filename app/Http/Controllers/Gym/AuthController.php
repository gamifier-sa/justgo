<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymRegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\City;
use App\Models\Gym;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard('gyms')->user()) {
            return redirect()->route('index');
        }
        return view('gyms.login');
    }
    public function registerForm()
    {
        $cities = City::get();
        return view('gyms.register', compact('cities'));
    }

    public function registerPost(GymRegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['admin_active'] = 'notactive';
        Gym::create($data);

        return redirect()->route('gyms.login')->with(['success' => 'سيُراجع الحساب من قبل مسؤول أو موظف، ثم سيتم تفعيله']);
    }

    public function login(LoginRequest $request)
    {
        $gym = Gym::where('email', $request['email'])->first();

        if (!$gym) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid Email Or Password!']);
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('gyms')->attempt($credentials)) {
            // Check additional conditions
            $user = Auth::guard('gyms')->user();

            if ($user && $user->admin_active === 'active') {
                $request->session()->regenerate();
                return redirect()->intended(route('index'));
            } else {
                // User is not active, display a message and redirect back
                Auth::guard('gyms')->logout();
                return redirect()->back()->with('error', 'Your account is not active.');
            }
        }



        return redirect()->back()->withErrors(['error' => 'Invalid Email Or Password!']);
    }

    public function getResetPassword()
    {
        return view('gyms.auth.reset-password');
    }

    public function postResetPassword(Request $request)
    {
        $gym = Gym::where('email', $request['email'])->first();

        if (!$gym) {
            return redirect()->back()->with(['error' => 'Email Not Found']);
        }

        if ($gym->status != 'active') {
            return redirect()->back()->with(['error' => 'Your Account is Not Active']);
        }

        DB::table('password_reset_tokens')->where('email', '=', $request['email'])->delete();

        $gymName = $gym->first_name . ' ' . $gym->last_name;
        $resetCode = rand(11111111, 99999999);
        $resetLink = url('super_gym_dashboard/check-reset-password?code=' . $resetCode);

        DB::table('password_reset_tokens')->insert([
            'email'           => $request['email'],
            'token'           => $resetCode,
            'created_at'      => date('Y-m-d h:i:s'),
            'expiration_date' => date("Y-m-d h:i:s", strtotime('+8 hours')),
        ]);

        // Mail::to($request['email'])->send(new GymResetPasswordMail($gymName, $resetLink));

        return redirect()->back()->with(['success' => 'Reset Link Sent To Your Email']);
    }

    public function checkResetCode(Request $request)
    {
        $checkResetCode = DB::table('password_reset_tokens')->where('token', $request['code'])->first();

        if (!$checkResetCode) {
            return view('gyms.auth.reset-password')->with(['error' => 'Reset Code is Invalid']);
        }

        // Check Reset Code Expiration
        $currentDate = Carbon::parse(date('Y-m-d h:i:s'));
        $expirationDate = Carbon::parse($checkResetCode->expiration_date);
        $diff = $currentDate->diffInHours($expirationDate);

        if ($diff >= 8) {
            return view('gyms.auth.reset-password')->with(['error' => 'Reset Code is Expired']);
        }

        return view('gyms.auth.new-password')->with(['code' => $checkResetCode->token]);
    }

    public function changePassword(Request $request)
    {
        $checkCode = DB::table('password_reset_tokens')->where('token', $request['code'])->first();
        $gym = Gym::where('email', $checkCode->email)->first();

        // Check New Password and Confirm Password
        if ($request['new_password'] != $request['confirm_password']) {
            return redirect()->back()->with(['error' => 'New Password Does Not Match Confirm Password']);
        }

        $gym->update(['password' => Hash::make($request['new_password'])]);

        return redirect()->route('gyms.postLogin');
    }

    public function logout()
    {
        Auth::guard('gyms')->logout();
        return redirect()->route('gyms.login');
    }
}
