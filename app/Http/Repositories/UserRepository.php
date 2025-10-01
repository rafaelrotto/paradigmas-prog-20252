<?php

namespace App\Http\Repositories;

use App\Interfaces\Repository;
use App\Models\User;

class UserRepository implements Repository
{
    public function __construct(private User $model) {}

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

    public function store(array $data)
    {
        return $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    public function show(string $id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $data, string $id)
    {
        $user = $this->show($id);

        $user->update($data);

        return $user->fresh();
    }

    public function destroy(string $id)
    {
        $this->show($id)->delete();
    }
}
