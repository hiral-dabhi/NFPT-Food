<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'document_name' => 'required',
            'document_file' => 'nullable|mimes:pdf,jpg,jpeg,png',
        ];
    }
}
