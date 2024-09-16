<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemLogManagementRequest extends FormRequest
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
            'aaa_auth_log' => 'required',
            'app_auth_log' => 'required',
            'app_event_log' => 'required',
            'cts_nat_event_log' => 'required',
        ];
    }
}
