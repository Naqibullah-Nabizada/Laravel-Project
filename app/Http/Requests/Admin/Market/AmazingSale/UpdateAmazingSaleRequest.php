<?php

namespace App\Http\Requests\Admin\Market\AmazingSale;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAmazingSaleRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'percentage' => 'required|numeric',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'status' => 'required|in:0,1',
        ];
    }
}
