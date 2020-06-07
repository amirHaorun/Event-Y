<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicket extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'event_id'=>'required',
            'type'=>'required',
            'descrip' => 'required',
            'price'=>'required',
            'available_tickets'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'descrip.required' => 'You Have To Describe The Feature Of This Ticket',
            'available.required' => 'You Have To Specify The Amount Of Tickets',

        ];
    }
}
