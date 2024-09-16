<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardStoreRequest extends FormRequest
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
            'quantity' => 'required|numeric|min:0|max:500',
            'prefix' => 'max:2',
            'valid_till' => 'required|date',
            'verification' => 'required',
            'service_id' => 'required',
            'concurrent_user' => 'required|numeric',
            'nas_id' => 'required',
            'operator_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nas_id.required' => 'This field is required.',
        ];
    }
}
