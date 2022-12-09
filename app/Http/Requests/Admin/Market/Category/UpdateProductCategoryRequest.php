<?php

namespace App\Http\Requests\Admin\Market\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'tags' => 'required|min:3|max:100|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?؟* ]+$/u',
            'image' => 'image|mimes:png,jpg,jpeg',
            'show_in_menu' => 'required|in:0,1',
            'status' => 'required|in:0,1',
            'parent_id' => 'nullable|min:1|regex:/^[0-9]+$/u|exists:product_categories,id',
            'description' => 'required|min:3|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?؟* ]+$/u',
        ];
    }
}
