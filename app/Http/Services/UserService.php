<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Interfaces\Service;
use App\Models\User;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {}

    public function index(array $data)
    {
        return $this->userRepository->index($data);
    }
}