<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'full_name'=> 'required',
            'email'=>'required',
            'phone'=>'required',
            'role_id'=>'required',
            'adress'=>'required',
            'password'=>'required',
            'gender'=>'required',

        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

}
