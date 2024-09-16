<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'portal_user_name' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'priority' => 'required',
            'group_misc_id' => 'required',
            'operator_id' => 'required',
            'employee_id' => 'required',
            'file_name[]' => 'mimes:pdf,jpg,jpeg,png',
            'due_date' => 'required',
        ];
    }
}
