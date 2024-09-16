<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'company_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'domain_name' => 'required',
            'language_code' => 'required',
            'currency_code' => 'required',
            'session_timeout_misc_id' => 'required',
            'kyc_verification_docs_misc_id' => 'required',
            'is_user_with_kyc_docs' => 'required',
            'is_kyc_alert' => 'required',
        ];
    }
}
