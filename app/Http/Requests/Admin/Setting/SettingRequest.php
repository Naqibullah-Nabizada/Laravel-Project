<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'description' => 'required|min:3|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'keywords' => 'required|min:3|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'logo' => 'image|mimes:png,jpg,jpeg',
            'icon' => 'image|mimes:png,jpg,jpeg',
        ];
    }
}
