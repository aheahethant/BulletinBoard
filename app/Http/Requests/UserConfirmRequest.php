<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserConfirmRequest extends FormRequest
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
            'c_name' => 'required',
            'email' => 'required',
            'c_password' => 'required',
            'confirm_password' => 'required_with:c_password|same:c_password',
            'profile' => 'required',
            'c_type' => 'required'
        ];
    }
}
