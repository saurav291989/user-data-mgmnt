<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'email'         => 'required|email:rfc,dns|unique:user_data,email',
            'city'          => 'required|regex:/^[A-Za-z\s]+$/|max:100',
            'age'           => 'required|integer|min:1|max:90',
            'gender'        => 'required|in:Male,Female,Other',
            'department_id' => 'required|exists:departments,id',
        ];
    }
}
