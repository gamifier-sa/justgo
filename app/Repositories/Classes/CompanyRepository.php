<?php

namespace App\Repositories\Classes;

use App\Models\Company;
use App\Models\Setting;
use Illuminate\Http\Request;


class CompanyRepository extends BasicRepository
{
    /**
     * @var array
     */

    protected array $fieldSearchable = [
        'id', 'name','phone','email'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Company::class;
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
     * @param      $request
     * @param null $id
     */

     public function update($request, $id = null)
     {
         $category = $this->find($id);
         if (isset($request['logo'])) {
             $request['logo'] =  storeImage('Companies', $request['logo']);
             deleteImage('Companies', $category['logo']);
         }
         if (isset($request['background_image'])) {
            $request['background_image'] =  storeImage('Companies', $request['background_image']);
            deleteImage('Companies', $category['background_image']);
        }
        if (isset($request['splash_image'])) {
            $request['splash_image'] =  storeImage('Companies', $request['splash_image']);
            deleteImage('Companies', $category['splash_image']);
        }
         return $this->save($request, $id);
     }
}
