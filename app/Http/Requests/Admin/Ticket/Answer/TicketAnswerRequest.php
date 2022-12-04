<?php

namespace App\Http\Requests\Admin\Ticket\Answer;

use Illuminate\Foundation\Http\FormRequest;

class TicketAnswerRequest extends FormRequest
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
            'description' => 'required|min:2|regex:/^[ا-یa-zA-z0-9\آ,.;,$&?؟* ]+$/u',
        ];
    }
}
