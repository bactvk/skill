<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Please input userName',
            'password.required' => 'Please input password',
            'captcha.required'  => 'Please input captcha',
            'captcha.captcha' => 'invalid captcha',
            'email.required' => 'Please input email',
            'email.unique' => 'Email existed',
            'email.email' => 'Please input email valid',

        ];
    }
}
