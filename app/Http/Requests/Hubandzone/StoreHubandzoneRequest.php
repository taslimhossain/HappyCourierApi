<?php

namespace App\Http\Requests\Hubandzone;

use Illuminate\Foundation\Http\FormRequest;

class StoreHubandzoneRequest extends FormRequest
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
            'hub_id'      => ['required'],
            'zone_id'      => ['required', 'unique:hubandzones'],
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
            'hub_id.required' => __('The :attribute field is required', ['attribute' => __('hub_id')]),
            'zone_id.required' => __('The :attribute field is required', ['attribute' => __('zone_id')]),
            'zone_id.unique' => __('The :attribute has already been taken for a hub', ['attribute' => __('zone')]),
        ];
    }

}
