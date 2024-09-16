<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyUpdateRequest extends FormRequest
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
        $currency = $this->route('currency');

        return [
            'title' => 'required|unique:currency,title,' . $currency->id,
            'country_id' => 'required',
            'sign' => 'required',
            'status' => 'required',
        ];
    }
}
