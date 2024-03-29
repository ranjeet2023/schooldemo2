<?php

/**
 * .
 * User: 
 * Date: 7/25/2017
 * Time: 7:12 AM
 */
namespace App\Http\Requests\Hostel\Resident;

use Illuminate\Foundation\Http\FormRequest;

class AddValidation extends FormRequest
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
            'user_type'    => 'required',
            'reg_no'       => 'required | max:15',
            'hostel'       => 'required',
            'room_select'  => 'required',
            'bed_select'   => 'required',
        ];
    }

   /* public function messages()
    {
        return [
            'title.unique' => 'This Time Already Register',
        ];
    }*/
}
