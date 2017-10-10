<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaiseTicketFormRequest extends FormRequest
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
            /*'ticketId' => 'required',*/
            'emailId' => 'required | email',
            'phoneNo' => 'required | min:9 | max:12',
            'firstName'  => 'required | alpha | max:20',
            'lastName'  => 'required | alpha | max:20',
            'subject'  => 'required | max:100',
            /*'priority'  => 'required',*/
            'serviceArea'  => 'required',
            'preferredContact'  => 'required',
            'description'  => 'required | max:200',
        ];
    }
}
