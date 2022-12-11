<?php

namespace App\Http\Requests\Admin\Market\CategoryAttribute;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryAttributeRequest extends FormRequest
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
            'name' => 'required|min:1|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'unit' => 'required|min:1|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'category_id' => 'required|exists:product_categories,id',
        ];
    }
}
