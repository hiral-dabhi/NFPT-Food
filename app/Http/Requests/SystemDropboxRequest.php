<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemDropboxRequest extends FormRequest
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
            'enable_billing_dropbox' => 'required',
            'app_key_dropbox' => 'nullable|required_if:enable_billing_dropbox,1',
            'app_secret_dropbox' => 'nullable|required_if:enable_billing_dropbox,1',
            'access_token_dropbox' => 'nullable|required_if:enable_billing_dropbox,1',
            'autobackup_interval_dropbox' => 'nullable|required_if:enable_billing_dropbox,1',
        ];
    }
}
