<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    public function index()
    {
        return User::all();
    }

    public function store(array $data)
    {
       return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password'])
       ]);
    }
}