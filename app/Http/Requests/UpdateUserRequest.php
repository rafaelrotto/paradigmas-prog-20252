<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|max:100|string',
            'email' => [
                'sometimes',
                Rule::unique('users', 'email')->ignore($this->route('user')),
                'max:100',
                'string'
            ],
            'password' => 'sometimes|min:6|max:20|string',
            'password_confirmation' => 'required_with:password|same:password',
            'type' => 'sometimes|in:admin,manager'
        ];
    }
}
