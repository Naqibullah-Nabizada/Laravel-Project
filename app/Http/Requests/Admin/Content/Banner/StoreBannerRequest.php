<?php

namespace App\Http\Requests\Admin\Content\Banner;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'title' => 'required|min:3|regex:/^[ا-یa-zA-Z0-9\آ,-.;,&?؟* ]+$/u',
            'position' => 'required|numeric|regex:/^[0-9]+$/u',
            'image' => 'required|mimes:png,jpg,jpeg,gif|image',
            'url' => 'required|min:3|max:100|regex:/^[a-zA-Z0-9\:\/][a-zA-Z0-9-\.]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}+$/u',
            'status' => 'required|in:0,1',
        ];
    }
}
