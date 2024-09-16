<?php

namespace App\Http\Requests;

use App\Models\Config;
use Illuminate\Foundation\Http\FormRequest;

class LeaseRequest extends FormRequest
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
        $config = Config::where('key', 'kyc_verification_docs_misc_id')->pluck('value')->first();
        $config = trim($config) !== '' ? explode(',', $config) : [];
        $rules = [
            'name' => 'required|string|max:255',
            'mobile_no' => 'required|digits:10',
            'email' => 'required|email|max:255',
            'operator' => 'required|string|max:255',
            'id_proof_type' => 'required',
            'id_proof' => 'required|mimes:jpeg,png,jpg,pdf',
            'username' => 'required|unique:users',
            'password' => 'required',
            'portal_login' => 'required_without:same_as_above|unique:user_details,portal_login',
            'portal_password' => 'required_without:same_as_above',
            'ipv4_static_pool' => 'required',
            'ipv4_static_ip' => 'required',
        ];
        foreach ($config as $field) {
            if ($field === 'id_proof' || $field === 'address_proof') {
                $rules[$field . '_type'] = 'required';
            }
            $rules[$field] = 'required|mimes:pdf,jpg,jpeg,png';
        }
        return $rules;
    }
}
