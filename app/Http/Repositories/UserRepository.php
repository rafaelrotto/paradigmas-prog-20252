<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model) {
        parent::__construct($model);
    }

    public function index(array $data)
    {
        return $this->model->where(function ($query) use ($data) {
            if (isset($data['name'])) {
                $query->where('name', 'like',  '%' . $data['name'] . '%');
            }

            if (isset($data['email'])) {
                $query->where('email', 'like',  '%' . $data['email'] . '%');
            }
        })->get();
    }
}
