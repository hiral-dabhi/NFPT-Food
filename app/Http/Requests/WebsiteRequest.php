<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteRequest extends FormRequest
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
    public function rules()
    {
        return [
            'about_us' => 'required',
            'terms_condition' => 'required',
            'logo' => 'nullable|file|mimes:png|max:2048',
            'home_image' => 'nullable|file|mimes:jpeg|max:2048',
            'android_app_link' => 'required',
            'iphone_app_link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'about_us.required' => 'Please enter your about us information.',
            'terms_condition.required' => 'Please accept the terms and conditions.',
            'logo.required' => 'Please upload your logo.',
            'logo.mimes' => 'The logo must be a PNG file.',
            'home_image.required' => 'Please upload the home image.',
            'home_image.mimes' => 'The home image must be a JPEG file.',
            'android_app_link.required' => 'Please enter the Android app link.',
            'iphone_app_link.required' => 'Please enter the iPhone app link.',
        ];
    }
}
