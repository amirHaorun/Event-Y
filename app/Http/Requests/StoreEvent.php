<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvent extends FormRequest
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

            'categ_id'=>'required',
            'name'=>'required',
            'venue'=>'required',
            'descrip'=>'required','max:355',
            'photo'=>'required',
            'status'=>'required',
            ];
    }
    public function messages()
    {
        return [
            'categ_id.required' => 'You Have To Specify Category For This Event',
            'descrip.required' => 'You Have To Specify Description For This Event',

        ];
    }
}
