<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'service_name' => 'required',
            'description' => 'required',
            'service_group' => 'required',
            // 'service_type' => 'required',
            'price' => 'required|numeric',
            'down_rate' => 'required|numeric',
            'up_rate' => 'required|numeric',
            'burst_limit' => 'numeric',
            'from_burst_limit' => 'numeric',
            'threshold_limit' => 'numeric',
            'from_threshold_limit' => 'numeric',
            'burst_time' => 'numeric',
            'from_burst_time' => 'numeric',
            'priority' => 'numeric',
            'data_limiter' => 'numeric',
            'data_limiter_misc_id' => 'required',
            'uptime_limiter' => 'numeric',
            'expiration_limiter' => 'numeric',
            // 'service_mode' => 'required',
            'is_data_limiter_enable' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'is_data_limiter_enable.required' => 'This field is required.',
        ];
    }
}
