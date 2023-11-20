<?php

namespace App\Http\Controllers\Api\Employees\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Messaging\SmsGlobalService;
use App\Models\Employee;
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
            'email' => 'required'
        ]);
        $employee = Employee::where('phone', $request->email)
            ->orWhere('email', $request->email)
            ->first();
        if ($employee) {
            return response()->success([
                'employee' =>  new  EmployeeResource($employee)

            ]);
        } else {
            return response()->fail([
                'message' =>   __('admin.wrong_employee_account')
            ]);
        }
    }
}
