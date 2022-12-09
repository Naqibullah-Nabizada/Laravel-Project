<?php

namespace App\Http\Requests\Admin\Market\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'persion_name' => 'required|min:3|max:20|regex:/^[ا-یa-zA-z0-9\آء ]+$/u',
            'original_name' => 'required|min:3|max:20|regex:/^[ا-یa-zA-z0-9\ءآ ]+$/u',
            'tags' => 'required|min:3|max:100|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?؟* ]+$/u',
            'logo' => 'image|mimes:png,jpg,jpeg',
            'status' => 'required|in:0,1',
        ];
    }
}
