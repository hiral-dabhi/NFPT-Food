<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'title' => 'required|unique:sub_category',
            'category_id' => 'required',
            'status' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'short_name.required' => 'Please enter a short name',
    //         'nas_type.required' => 'Please select a NAS type',
    //         'ip_address.required' => 'Please enter an IP address',
    //         'ip_address.ipv4' => 'Please enter a valid IP address',
    //         'secret.required' => 'Please enter a secret',
    //         'coa_port.required' => 'Please enter COA Port',
    //         'coa_port.digits' => 'COA Port must be a numeric value',
    //         'api_port.required' => 'Please enter API Port',
    //         'api_port.digits' => 'API Port must be a numeric value',
    //         'interim_time.required' => 'Please enter Interim Time',
    //         'interim_time.digits' => 'Interim Time must be a numeric value',
    //         'log_server.required' => 'Please select a Log Server',
    //     ];
    // }
}
