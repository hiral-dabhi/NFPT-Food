<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfessionalProfileRequest extends FormRequest
{
    public function authorize()
    {
        // Authorize request, return true to allow all authenticated users
        return true;
    }

    public function rules()
    {
        $user = auth()->user(); // Assuming 'user' is the route parameter for user ID
    //  echo '<pre>';
    //  print_r($user->restaurantDetail->id);
    //  die;
        return [
            'name' => 'required|string|max:255',
        
            'email' => 'nullable|email|unique:users,email,' . $user->id,

            'contact_number' => 'required|numeric|digits_between:10,15',
            'business_name' => 'required|string|max:255',
            'business_email' => 'nullable|email|unique:restaurant_master,email,' . $user->restaurantDetail->id,

            // 'business_email' => [
            //     'nullable',
            //     'email',
            //     Rule::unique('restaurant_master', 'email')->ignore($user->restaurantDetail->id), // Ignore the current restaurant's email
            // ],
            // 'business_email' => 'nullable|email|unique:restaurant_master,email,' . $user->restaurantDetail->id,

            'business_contact' => 'required|numeric|digits_between:10,15',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'open_at' => 'required|date_format:H:i',
            'close_at' => 'required|date_format:H:i',
            // 'password' => 'nullable|min:8|confirmed', // Password confirmation
            // 'status' => 'required|in:0,1', // For radio button active/inactive
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'The email address must be unique across both user and restaurant accounts.',
            'business_email.unique' => 'The business email must be unique in the restaurant records.',
        ];
    }
}
