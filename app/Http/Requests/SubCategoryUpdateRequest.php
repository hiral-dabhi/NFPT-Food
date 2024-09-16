<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryUpdateRequest extends FormRequest
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
        $subCategory = $this->route('subCategory');
        return [
            'title' => 'required|unique:sub_category,title,' . $subCategory->id,
            'category_id' => 'required',
            'status' => 'required',
            'type' => 'required',
        ];
    }
}
