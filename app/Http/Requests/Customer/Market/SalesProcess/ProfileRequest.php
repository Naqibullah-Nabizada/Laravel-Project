<?php

namespace App\Http\Requests\Customer\Market\SalesProcess;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'sometimes|required|max:120|min:3|regex:/^[ا-یa-zA-Zۀةي ؤأءآ ]+$/u',
            'last_name' => 'sometimes|required|max:120|min:3|regex:/^[ا-یa-zA-Zۀةي ؤأءآ ]+$/u',
            'mobile' => 'sometimes|required|digits:10|starts_with:077,076,070,079,078,074,072|unique:users',
            'email' => 'nullable|email|unique:users',
        ];
    }
}
