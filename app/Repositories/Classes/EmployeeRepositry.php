<?php

namespace App\Repositories\Classes;

use App\Mail\InvitationEmail;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\User;
use App\Repositories\Interfaces\IAdminRepository;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeRepositry extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */

    protected array $fieldSearchable = [
        'id', 'name', 'email', 'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Employee::class;
    }
    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function getFieldsRelationShipSearchable()
    {
        return $this->model->searchRelationShip;
    }

    public function translationKey()
    {
        return $this->model->translationKey();
    }

    public function findBy(Request $request, $andsFilters = []): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(orderBy: $request->order, andsFilters: $andsFilters);
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        if (isset($data['profile_image'])) {
            $data['profile_image']  = storeImage('Employees', $data['profile_image']);
        }
        $data['status']= 'active';
        $data['company_id']=auth('companies')->user()->id;
        $data['password'] = Hash::make($data['password']);

         $this->create($data);


    }
    public function list()
    {
    }
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show($id)
    {
        return $this->find($id);
    }
    /**
     * @param      $request
     * @param null $id
     */

    public function update($request, $id = null)
    {
        $employee = $this->find($id);
        if (isset($request['profile_image'])) {
            $request['profile_image'] = storeImage('Employees', $request['profile_image']) ?? $employee->profile_image;
            deleteImage('Employees', $employee['profile_image']);
        }

        return $this->save($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        $employee = $this->find($id);
        deleteImage('Employees', $employee['profile_image']);
        return $this->delete($id);
    }
}
