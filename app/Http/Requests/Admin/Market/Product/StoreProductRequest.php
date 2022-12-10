<?php

namespace App\Http\Requests\Admin\Market\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'status' => 'required|in:0,1',
            'marketable' => 'required|in:0,1',
            'published_at' => 'required|string',
            'price' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'introduction' => 'required|min:3|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?؟* ]+$/u',
        ];
    }
}