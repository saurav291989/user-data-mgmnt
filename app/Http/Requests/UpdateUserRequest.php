<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'regex:/^[A-Za-z\s]+$/',
                'max:255'
            ],

            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('user_data', 'email')
                    ->ignore($this->user->id)
            ],

            'city' => [
                'required',
                'regex:/^[A-Za-z\s]+$/',
                'max:100'
            ],

            'age' => [
                'required',
                'integer',
                'min:1',
                'max:120'
            ],

            'gender' => [
                'required',
                'in:Male,Female'
            ],

            'department_id' => [
                'required',
                'exists:departments,id'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'Name can contain only letters and spaces.',
            'city.regex' => 'City can contain only letters and spaces.',
        ];
    }
}