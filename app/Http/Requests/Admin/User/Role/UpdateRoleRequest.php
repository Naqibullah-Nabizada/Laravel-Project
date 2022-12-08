<?php

namespace App\Http\Requests\Admin\User\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'name' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Z\ۀةي ؤأءآ ]+$/u',
            'description' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Zۀةي ؤأءآ ]+$/u',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'عنوان نقش',
            'description' => 'توضیحات نقش',
        ];
    }
}
