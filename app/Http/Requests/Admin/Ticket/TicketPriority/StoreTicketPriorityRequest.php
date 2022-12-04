<?php

namespace App\Http\Requests\Admin\Ticket\TicketPriority;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketPriorityRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|regex:/^[ا-یa-zA-z0-9\آ ]+$/u',
            'status' => ['required', 'numeric', 'in:0,1']
        ];
    }
}
