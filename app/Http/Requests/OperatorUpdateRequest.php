<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorUpdateRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact' => 'required',
            'city' => 'required',
            'password' => 'nullable|required_if:is_password,true',
            'confirm_password' => 'nullable|required_if:is_password,true|same:password',
            'expiry_date' => 'required',
            'status' => 'required',
        ];
    }
}
