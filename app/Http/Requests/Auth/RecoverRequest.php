<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RecoverRequest extends FormRequest
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
        $login = $this->request->get('verifyLogin');
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
                'verifyLogin' => ['required', 'email', 'exists:users,email'],
            ];
        } else {
            return [
                'verifyLogin' => ['required', 'numeric', 'digits:11', 'exists:users,mobile_no'],
            ];            
        }
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'verifyLogin.required' => __('The :attribute field is required', ['attribute' => __('email')]),
            'verifyLogin.email' => __('The :attribute must be a valid email address', ['attribute' => __('email')]),
            'verifyLogin.digits' => __('The :attribute must be :max digits', ['attribute' => __('mobile number'), 'max' => 11]),
            'verifyLogin.exists' => __('The email or phone entered is not registered'),
        ];
    } 
}
