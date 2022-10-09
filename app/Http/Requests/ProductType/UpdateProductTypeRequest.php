<?php

namespace App\Http\Requests\ProductType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductTypeRequest extends FormRequest
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
            'amount'      => ['required','numeric'],
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
            'amount.required' => __('The :attribute field is required', ['attribute' => __('amount')]),
            'name.max' => __('The :attribute may not be greater than :max characters', ['attribute' => __('name'), 'max' => 255]),
            'amount.numeric' => __('Please enter a valid amount, only number'),
        ];
    }

}
