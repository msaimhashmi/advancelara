<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormValidation extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|max:30',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This name field is required. Please fill that!',
            'name.max' => 'This name field is allow only 20 chars!',

            'email.required' => 'This email field is required. Please fill that!',
            'email.max' => 'This email field is allow only 30 chars!'
        ];
    }
}
