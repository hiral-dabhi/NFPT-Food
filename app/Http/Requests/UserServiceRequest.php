<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserServiceRequest extends FormRequest
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
            'service_id' => 'required',
            'concurrent_user' => 'required',
            'nas_id' => 'required',
            'ipv4_mode' => 'required',
            'ipv6_pool' => 'nullable|required_if:ipv6_prefix_enable,0',
            'ipv6_prefix' => 'nullable|required_if:ipv6_prefix_enable,0',
            'ipv6_expirydate' => 'nullable|required_if:ipv6_prefix_enable,0',
            'ipv6_pool_delegation' => 'nullable|required_if:ipv6_delegation_enable,0',
            'ipv6_prefix_delegation' => 'nullable|required_if:ipv6_delegation_enable,0',
            'ipv6_expirydate_delegation' => 'nullable|required_if:ipv6_delegation_enable,0',
        ];
    }
}
