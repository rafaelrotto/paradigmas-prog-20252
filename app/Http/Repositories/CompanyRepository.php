<?php

namespace App\Http\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function __construct(private Company $model) {}

    public function index(array $data)
    {
        $companies = $this->model->where(function ($query) {
            if (isset($data['name'])) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            }
            if (isset($data['licensed'])) {
                $query->where('licensed', $data['licensed'] == "true");
            }
        });

        return isset($data['per_page'])
            ? $companies->paginate($data['per_page'])
            : $companies->get();
    }
}
