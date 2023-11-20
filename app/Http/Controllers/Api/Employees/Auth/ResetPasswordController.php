<?php

namespace App\Http\Controllers\Api\Employees\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ResetPasswordController extends Controller
{



    public function resetEmployeePassword(Request $request)
    {

        $request->validate($this->rules());
        $employee = Employee::where('phone', $request->email)
        ->orWhere('email', $request->email)
        ->first();
        if ($employee) {

            $employee->password = bcrypt($request->password);
            $employee->save();
            return $this->sendResetResponse();
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
            'email' => 'required|min:4|max:120',
            'password' => 'required|confirmed|min:6|max:60',
        ];
    }

}
