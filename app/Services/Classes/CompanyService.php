<?php

namespace App\Services\Classes;

use App\Repositories\Classes\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyService
{
    protected $companyRepository;
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function show($id)
    {
        return $this->companyRepository->show($id);
    }

    public function update($request, $id)
    {
        return $this->companyRepository->update($request, $id);
    }
}
