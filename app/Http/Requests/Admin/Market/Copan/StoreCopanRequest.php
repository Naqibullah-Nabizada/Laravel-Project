<?php

namespace App\Http\Requests\Admin\Market\Copan;

use Illuminate\Foundation\Http\FormRequest;

class StoreCopanRequest extends FormRequest
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
            'code' => 'required|min:1|max:20|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'amount' => ['required', request()->amount_type === 0 ? 'max:100' : '', 'numeric'],
            'discount_ceiling' => 'required|numeric',
            'amount_type' => 'required|numeric',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'type' => 'required|in:0,1',
            'status' => 'required|in:0,1',
            'user_id' => 'required_if:type,1|exists:users,id',
        ];
    }

    public function attributes()
    {
        return [
            'amount' => 'مقدار تخفیف',
            'code' => 'کد کوپن',
            'type' => 'نوع کوپن',
        ];
    }
}
