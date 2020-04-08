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
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'please input name',
            'email.required' => 'please input email',
            'email.email' => 'please input email valid',
            'email.unique' => 'Email exists , plase input other email'
        ];
    }
}
