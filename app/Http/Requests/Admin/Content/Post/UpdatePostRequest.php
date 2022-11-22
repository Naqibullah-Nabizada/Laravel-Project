<?php

namespace App\Http\Requests\Admin\Content\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:3|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'tags' => 'required|min:3|max:100|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?* ]+$/u',
            'category_id' => 'required|numeric|exists:post_categories,id',
            'image' => 'image|mimes:png,jpg,jpeg',
            'status' => 'required|in:0,1',
            'summary' => 'required|min:3|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?* ]+$/u',
            'body' => 'required|min:3|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?* ]+$/u',
        ];
    }
}
