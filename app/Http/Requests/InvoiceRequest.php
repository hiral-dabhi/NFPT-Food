<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'tax1_config_status' => 'required',
            'tax1_name' => 'required',
            'tax1_per' => [
                'required',
                'numeric',
            ],
            'tax2_config_status' => 'required',
            'tax2_name' => 'required',
            'tax2_per' => [
                'required',
                'numeric',
            ],
            'tax_no_label' => 'required',
            'rollback_hour' => [
                'required',
                'numeric',
            ],
            'due_days' => [
                'required',
                'numeric',
            ],
            'tax_invoice_prefix' => 'required',
            'no_tax_invoice_prefix' => 'required',
            'invoice_size' => 'required',
            'invoice_color' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute field is required.',
            'numeric' => ':attribute must be a number.',
        ];
    }

    public function attributes(): array
    {
        return [
            'tax1_config_status' => 'Tax 1 Config Status',
            'tax1_name' => 'Tax 1 Name',
            'tax1_per' => 'Tax 1 Percentage',
            'tax2_config_status' => 'Tax 2 Config Status',
            'tax2_name' => 'Tax 2 Name',
            'tax2_per' => 'Tax 2 Percentage',
            'tax_no_label' => 'Tax No Label',
            'rollback_hour' => 'Rollback Hour',
            'due_days' => 'Due Days',
            'tax_invoice_prefix' => 'Tax Invoice Prefix',
            'no_tax_invoice_prefix' => 'No Tax Invoice Prefix',
            'invoice_size' => 'Invoice Size',
            'invoice_color' => 'Invoice Color',
        ];
    }
}
