<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'max:255'],
            'mobile_no' => ['required', 'numeric', 'digits:11', 'unique:users'],
            'email'     => ['email', 'max:255', 'unique:users'],
            'password'  => ['required', 'min:6', 'confirmed']
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('The :attribute field is required', ['attribute' => __('name')]),
            'name.max' => __('The :attribute may not be greater than :max characters', ['attribute' => __('name'), 'max' => 255]),
            'mobile_no.required' => __('The :attribute field is required', ['attribute' => __('mobile number')]),
            'mobile_no.number' => __('The :attribute must be a valid mobile number', ['attribute' => __('mobile number')]),
            'mobile_no.unique' => __('The :attribute has already been taken', ['attribute' => __('mobile number')]),
            'mobile_no.digits' => __('The :attribute must be :max digits', ['attribute' => __('mobile number'), 'max' => 11]),
            'email.email' => __('The :attribute must be a valid email address', ['attribute' => __('email')]),
            'email.max' => __('The :attribute may not be greater than :max characters', ['attribute' => __('email'), 'max' => 255]),
            'email.unique' => __('The :attribute has already been taken', ['attribute' => __('email')]),
            'password.required' => __('The :attribute field is required', ['attribute' => __('password')]),
            'password.min' => __('The :attribute must be at least :min characters', ['attribute' => __('password'), 'min' => 6]),
            'password.confirmed' => __('The :attribute confirmation does not match', ['attribute' => __('password')])
        ];
    }

}
