<?php

namespace App\Http\Services;

use App\Http\Repositories\CompanyRepository;

class CompanyService extends BaseService
{
    protected CompanyRepository $companyRepository;
    
    public function __construct(CompanyRepository $companyRepository)
    {
        parent::__construct($companyRepository);
        $this->repository = $companyRepository;
    }

    public function index(array $data)
    {
        return $this->companyRepository->index($data);
    }
}