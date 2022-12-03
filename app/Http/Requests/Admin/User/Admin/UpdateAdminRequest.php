<?php

namespace App\Http\Requests\Admin\User\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'first_name' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Zۀةي ؤأءآ ]+$/u',
            'last_name' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Zۀةي ؤأءآ ]+$/u',
            'mobile' => 'required|digits:10',
            'email' => 'required|email',
            'profile_photo_path' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'required|numeric|in:0,1'
        ];
    }
}
