<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//مش شرط يكون عامل دخول على النظام
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:50',
            'email' => 'required|max:50|email',
            'country_id' => 'required',
            'gender' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'fullname.required'=>'x',
            'email.required'=>'Please enter Email Address'
        ];
    }
}
