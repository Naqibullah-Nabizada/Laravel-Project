<?php

namespace App\Http\Requests\Admin\Content\FAQ;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            'question' => 'required|min:3|max:300|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?؟* ]+$/u',
            'answer' => 'required|min:3|max:2000|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?؟* ]+$/u',
            'tags' => 'required|min:3|max:100|regex:/^[ا-یa-zA-z0-9\آ><\/,.;\n\r,$&?؟* ]+$/u',
            'status' => 'required|in:0,1',
        ];
    }
}
