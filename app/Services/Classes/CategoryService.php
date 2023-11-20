<?php

namespace App\Services\Classes;

use App\Repositories\Classes\CategoryRepository;
use App\Services\Interfaces\ICategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function findBy(Request $request,$andsFilters=[])
    {
        return $this->categoryRepository->findBy($request,$andsFilters);
    }
    public function findByType($type)
    {
        return $this->categoryRepository->findByType($type);
    }

    public function store($request)
    {
        $this->categoryRepository->store($request);
    }


    public function show($id)
    {
        return $this->categoryRepository->show($id);
    }

    public function update($request, $id)
    {


        $category = $this->categoryRepository->update($request, $id);
        return $category;
    }

    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
    }
}

