<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
        $category = $this->route('category');

        return [
            'title' => 'required|unique:category_master,title,' . $category->id,
            'country_id' => 'required',
            'status' => 'required',
        ];
    }
}
