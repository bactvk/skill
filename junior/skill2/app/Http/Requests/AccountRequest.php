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
            'name' => 'required',
            'avatar' => 'mimes:jpeg,png,jpg,gif,svg|max:1024'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please input name',
            'email.required' => 'Plase input email',
            'email.email' => 'Plase input email valid',
            'email.unique' => 'Email already exists , plase input other email',

        ];
    }
}
