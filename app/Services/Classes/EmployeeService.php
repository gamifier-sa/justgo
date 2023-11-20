<?php

namespace App\Services\Classes;

use App\Repositories\Classes\EmployeeRepositry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    protected $employeeRepositry;

    public function __construct(EmployeeRepositry $employeeRepositry)
    {
        $this->employeeRepositry = $employeeRepositry;
    }

    public function findBy(Request $request,$andsFilters=[])
    {
        return $this->employeeRepositry->findBy($request,$andsFilters);
    }

    public function store($request)
    {
        $this->employeeRepositry->store($request);
    }


    public function show($id)
    {
        return $this->employeeRepositry->show($id);
    }

    public function update($request, $id)
    {
        if (!isset($request['password'])) {
            unset($request['password']);
        }
        if (isset($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }

        return $this->employeeRepositry->update($request, $id);

    }

    public function destroy($id)
    {
        $this->employeeRepositry->destroy($id);
    }
}

