<?php

namespace App\Http\Requests\Admin\Market\Store;

use Illuminate\Foundation\Http\FormRequest;

class AddToStoreRequest extends FormRequest
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
            'receiver' => 'required|min:3|max:40|regex:/^[ا-یa-zA-z0-9\آء ]+$/u',
            'deliverer' => 'required|min:3|max:40|regex:/^[ا-یa-zA-z0-9\آء ]+$/u',
            'description' => 'required|min:3|max:2000|regex:/^[ا-یa-zA-z0-9\ءآ ]+$/u',
            'marketable_number' => 'required|regex:/^[0-9]+$/u',
        ];
    }
}
