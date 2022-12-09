<?php

namespace App\Http\Requests\Admin\Market\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryRequest extends FormRequest
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
            'name' => 'required|min:3|regex:/^[ا-یa-zA-Z0-9\ءآ ]+$/u',
            'amount' => 'required|numeric',
            'delivery_time' => 'required|regex:/^[0-9]+$/u',
            'delivery_time_unit' => 'required|regex:/^[ا-یa-zA-Z\آء ]+$/u',
            'status' => 'required|in:0,1',
        ];
    }

    public function attributes()
    {
        return ['name' => 'روش ارسال '];
    }
}
