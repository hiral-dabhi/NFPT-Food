<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemFtpRequest extends FormRequest
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
            'enable_billing_ftp' => 'required',
            'host_ftp' => 'nullable|required_if:enable_billing_drive,1',
            'user_name_ftp' => 'nullable|required_if:enable_billing_drive,1',
            'password_ftp' => 'nullable|required_if:enable_billing_drive,1',
            'autobackup_interval_ftp' => 'nullable|required_if:enable_billing_drive,1',
        ];
    }
}
