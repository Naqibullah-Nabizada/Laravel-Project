<?php

namespace App\Http\Requests\Customer\Market\SalesProcess;

use Illuminate\Foundation\Http\FormRequest;

class AddAddressRequest extends FormRequest
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
            'province_id' => 'required|min:1|exists:provinces,id',
            'city_id' => 'required|min:1|exists:cities,id',
            'address' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Zۀةي ؤأءآ ]+$/u',
            'postal_code' => 'required|max:10|min:3|regex:/^[0-9]+$/u',
            'no' => 'required|min:1|',
            'unit' => 'required|max:120|min:1|regex:/^[0-9]+$/u',
            'receiver' => 'sometimes',
            'recipient_first_name' => 'required_with:receiver,on',
            'recipient_last_name' => 'required_with:receiver,on',
            'mobile' => 'required_with:receiver,on',
        ];
    }

    public function attributes()
    {
        return ['unit' => 'واحد','on' => 'سفارش خودم نیستم'];
    }
}
