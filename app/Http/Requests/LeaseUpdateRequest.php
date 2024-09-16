<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaseUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'mobile_no' => 'required|digits:10',
            'email' => 'required|email|max:255',
            // 'user_type' => 'required|string|max:255',
            // 'portal_login' => 'required|string|max:255',
            'operator' => 'required|string|max:255',
        ];
    }
}
