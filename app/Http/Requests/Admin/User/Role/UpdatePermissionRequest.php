<?php

namespace App\Http\Requests\Admin\User\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
            'permissions.*' => 'exists:permissions,id',
        ];
    }

    public function attributes()
    {
        return[
            'permissions.*' => 'دسترسی'
        ];
    }
}