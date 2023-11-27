<?php

namespace App\Repositories\Classes;

use App\Mail\InvitationEmail;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interfaces\IAdminRepository;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */

    protected array $fieldSearchable = [
        'id', 'first_name', 'last_name', 'email', 'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return User::class;
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
            $data['profile_image']  = storeImage('Users', $data['profile_image']);
        }
        $data['status']= 'active';
        $data['password'] = Hash::make($data['password']);

        $user=  $this->create($data);


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
        $user = $this->find($id);
        if (isset($request['profile_image'])) {
            $request['profile_image'] = storeImage('Users', $request['profile_image']) ?? $user->profile_image;
            deleteImage('Users', $user['profile_image']);
        }

        return $this->save($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        $user = $this->find($id);
        deleteImage('Users', $user['profile_image']);
        return $this->delete($id);
    }
}
