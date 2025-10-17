<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function login(array $data)
    {
        $user = User::query()->where('email', $data['email'])->first();

        if (!$user || ! Hash::check($data['password'], $user->password)) {
            abort(403, 'Não foi possível realizar o login, tente novamente!');
        }

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'company' => $user->company,
            'token' => $user->createToken('auth_token')->plainTextToken
        ];
    }

    public function logout()
    {
        $user = auth()->user();

        if (!$user) {
            abort(404, 'Não foi possível fazer o logout.');
        }

        $user->tokens()->delete();
    }
}