<?php

namespace App\Http\Requests\Admin\Notify\SMS;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSMSRequest extends FormRequest
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
            'body' => 'required|min:3|regex:/^[ا-یa-zA-z0-9\آ,.,&?؟* ]+$/u',
            'status' => 'required|in:0,1',
            'published_at' => 'required|numeric',
        ];
    }
}
