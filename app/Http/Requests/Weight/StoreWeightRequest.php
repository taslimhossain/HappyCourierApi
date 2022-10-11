<?php

namespace App\Http\Requests\Weight;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightRequest extends FormRequest
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
            'from'   => ['required'],
            'to'     => ['required'],
            'inside_amount' => ['required'],
            'inside_district' => ['required'],
            'outside_amount' => ['required'],
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
            'from.required' => __('The :attribute field is required', ['attribute' => __('from')]),
            'to.required' => __('The :attribute field is required', ['attribute' => __('to')]),
            'inside_amount.required' => __('The :attribute field is required', ['attribute' => __('Inside amount')]),
            'outside_amount.required' => __('The :attribute field is required', ['attribute' => __('Outside amount')]),
            'inside_district.required' => __('The :attribute field is required', ['attribute' => __('amount')]),
        ];
    }

}
