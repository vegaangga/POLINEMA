<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
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
            'name'          => 'required',
            'is_active'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'nama fasilitas tidak boleh kosong',
            'is_active.required'    => 'aktivasi tidak boleh kosong',
        ];
    }
}
