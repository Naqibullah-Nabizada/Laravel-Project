<?php

namespace App\Http\Requests\Admin\User\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
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
            'first_name' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Z\ۀةي ؤأءآ ]+$/u',
            'last_name' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Zۀةي ؤأءآ ]+$/u',
            'mobile' => 'required|digits:10|starts_with:077,076,070,079,078,074,072|unique:users',
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
            'profile_photo_path' => 'nullable|image|mimes:png,jpg,jpeg',
            'activation' => 'required|numeric|in:0,1'
        ];
    }
}
