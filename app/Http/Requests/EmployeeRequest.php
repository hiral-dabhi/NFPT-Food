<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required',
            // 'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'contact' => 'required',
            'description' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'operator' => 'required',
            'role' => 'required',
            'status' => 'required',
        ];
    }
}
