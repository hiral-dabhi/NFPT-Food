<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemGoogleRequest extends FormRequest
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
            'enable_billing_drive' => 'required',
            'client_id_drive' => 'nullable|required_if:enable_billing_drive,1',
            'client_secret_drive' => 'nullable|required_if:enable_billing_drive,1',
            'refresh_token_drive' => 'nullable|required_if:enable_billing_drive,1',
            'redirect_url_drive' => 'nullable|required_if:enable_billing_drive,1',
            'autobackup_interval_drive' => 'nullable|required_if:enable_billing_drive,1',
        ];
    }
}
