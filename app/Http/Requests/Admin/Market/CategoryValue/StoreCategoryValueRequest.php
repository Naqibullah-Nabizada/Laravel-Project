<?php

namespace App\Http\Requests\Admin\Market\CategoryValue;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryValueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'value' => 'required|min:1|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'price_increase' => 'required|numeric',
            'type' => 'required|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'product_id' => 'required|exists:products,id',
        ];
    }
}
