<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantOwnerRequest extends FormRequest
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
            // User details
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required|numeric|unique:users,contact_number',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'status' => 'required',

            // Business details
            'business_name' => 'required|string|max:255',
            'business_email' => 'required|email|unique:restaurant_master,email',
            'business_contact' => 'required|numeric|unique:restaurant_master,contact_number',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            // 'zip_code' => 'required|numeric',
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
