<?php

namespace App\Http\Requests\Admin\Market\CommonDiscount;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommonDiscountRequest extends FormRequest
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
            'title' => 'required|min:1|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'percentage' => 'required|numeric',
            'discount_ceiling' => 'required|numeric',
            'minimal_order_amount' => 'required|numeric',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'status' => 'required|in:0,1',
        ];
    }
}
