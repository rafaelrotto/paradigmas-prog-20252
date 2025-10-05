<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100|string',
            'email' => [
                'required',
                'unique:users,email',
                'max:100',
                'string'
            ],
            'password' => 'required|min:6|max:20|string',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome deve ter no máximo 100 caracteres.',
            'name.string' => 'O campo nome deve ser uma string.',
            'email.required' => 'O campo email é obrigatório.',
            'email.unique' => 'O email informado já está em uso.',
            'email.max' => 'O campo email deve ter no máximo 100 caracteres.',
            'email.string' => 'O campo email deve ser uma string.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter no mínimo 6 caracteres.',
            'password.max' => 'O campo senha deve ter no máximo 20 caracteres.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password_confirmation.required' => 'O campo de confirmação de senha é obrigatório.',
            'password_confirmation.same' => 'A confirmação de senha não corresponde à senha.'
        ];
    }
}
