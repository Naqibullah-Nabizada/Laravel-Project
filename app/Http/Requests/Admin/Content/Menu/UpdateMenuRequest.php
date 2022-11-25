<?php

namespace App\Http\Requests\Admin\Content\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name' => 'required|min:3|regex:/^[ا-یa-zA-Z0-9\آ,-.;,&?؟* ]+$/u',
            'parent_id' => 'nullable|min:1|regex:/^[0-9]+$/u|exists:menus,id',
            'url' => 'required|min:3|max:100|regex:/^[a-zA-Z0-9\:\/][a-zA-Z0-9-\.]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}+$/u',
            'status' => 'required|in:0,1',
        ];
    }
}
