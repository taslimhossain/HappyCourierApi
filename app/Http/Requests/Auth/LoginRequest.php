<?php

namespace App\Http\Requests\Auth;

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


    public function loginFieldType()
    {
        $login = $this->request->get('login');
        return filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile_no';
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        if( $this->loginFieldType() === 'email' ){
            return [
                'login' => ['required', 'email', 'exists:users,email'],
                'password' => ['required']
            ];
        } else {
            return [
                'login' => ['required', 'numeric', 'digits:11', 'exists:users,mobile_no'],
                'password' => ['required']
            ];
        }

        return [
            'login' => ['required'],
            'password' => ['required']
        ];

    }
    
    public function messages()
    {
        
        if( $this->loginFieldType() === 'email' ){
            return [
                'login.required' => __('The :attribute field is required', ['attribute' => __('email')]),
                'login.email' => __('Please enter a valid mobile number Or email address'),
                'login.exists' => __('The email entered is not registered'),
                'password.required' => __('The :attribute field is required', ['attribute' => __('password')])
            ];
        } else {
            return [
                'login.required' => __('The :attribute field is required', ['attribute' => __('mobile number')]),
                'login.numeric' => __('Please enter a valid mobile number Or email address'),
                'login.exists' => __('The mobile number entered is not registered'),
                'login.digits' => __('The :attribute must be :max digits', ['attribute' => __('mobile number'), 'max' => 11]),
                'password.required' => __('The :attribute field is required', ['attribute' => __('password')])
            ];
        }

        return [
            'login.required' => __('The :attribute field is required', ['attribute' => __('mobile number')]),
            'password.required' => __('The :attribute field is required', ['attribute' => __('password')])
        ];
    }

}
