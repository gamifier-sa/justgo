<?php

namespace App\Http\Controllers\Api\Employees\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Auth;
use App\Messaging\SmsGlobalService;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Rules\EncodedImage;
use Illuminate\Validation\Rule;
use App\Services\UserConfirmation;
use Illuminate\Support\Facades\Artisan;

class EmployeeLoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6|max:60',
            'device_token'=>'sometimes|nullable'

        ]);

        $data = $this->getDataForLogin($request);
        if ($token = auth()->guard('employee')->attempt(array_merge($data, ['status' => 'active']))) {
            $employee = Auth::guard('employee')->user();
            $employee->update(['device_token' => $request->device_token]);
            return response()->success([
                'token' => $token,
                'employee' =>  new  EmployeeResource($employee)

            ]);
        } elseif ($token = auth('employee')->attempt(array_merge($data, ['status' => 'active']))) {
            $employee = Auth::guard('employee')->user();
            return response()->success([
                'employee' =>  new  EmployeeResource($employee)

            ]);
        } elseif ($token = auth('employee')->attempt(array_merge($data, ['status' => 'notactive']))) {
            return response()->fail([
                'message' =>  __('admin.active_employee'),
            ]);
        } else {
            return response()->fail([
                'message' =>   __('admin.wrong_employeename_password')
            ]);
        }
    }
    public function getDataForLogin($request)
    {
        if (is_numeric($request->get('email'))) {
            return ['phone' => $request->get('email'), 'password' => $request->password];
        } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password' => $request->password];
        }
        return [];
    }


    public function updateToken(Request $request)
    {
        $validator = [
            'device_token' => 'required',
        ];
        $request->validate($validator);


        auth('employee')->user()->update(['device_token' => $request->device_token]);
        return response()->success([
            'massage' => __('admin.updateTokenfirebase')

        ]);
    }
}
