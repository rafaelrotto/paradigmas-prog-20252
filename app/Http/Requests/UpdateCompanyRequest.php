<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
            'name' => [
                'sometimes',
                'string',
                'max:50',
                'min:2',
                Rule::unique('companies', 'name')->ignore($this->route('company'))
            ],
            'licensed' => 'sometimes|in:true,false'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'O campo nome deve conter um texto.',
            'name.unique' => 'Já existe uma empresa com este nome.',
            'name.max' => 'O campo nome deve conter no máximo :max caracteres.',
            'name.min' => 'O campo nome deve conter no mínimo :min caracteres.',
            'licensed.in' => 'O campo licenciada deve ser true ou false.'
        ];
    }
}
