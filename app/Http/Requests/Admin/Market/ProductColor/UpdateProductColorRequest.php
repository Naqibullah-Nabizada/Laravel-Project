<?php

namespace App\Http\Requests\Admin\Market\ProductColor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductColorRequest extends FormRequest
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
            'color_name' => ['required', 'string'],
            'price_increase' => ['required', 'numeric'],
            'status' => ['required', 'in:0,1']
        ];
    }
}
