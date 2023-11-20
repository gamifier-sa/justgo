<?php

namespace App\Http\Controllers\Api\Employees\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeProfileController extends Controller
{
    public function myprofile()
    {
        $employee = Auth::guard('employee')->user();
        return response()->success([
            'employee' =>  new  EmployeeResource($employee)
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $employee = Auth::guard('employee')->user();

        $data = $request->validated();

        if (isset($request['profile_image'])) {
            $data['profile_image'] = storeImage('Employees', $data['profile_image']) ?? $employee->profile_image;
            deleteImage('Employees', $employee['profile_image']);
        }
        $employee->update($data);

        return response()->success([
            'employee' => new EmployeeResource($employee)
        ]);
    }


}
