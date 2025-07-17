<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResrevRequest extends FormRequest
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
            'check_in' => 'required',
            'check_out' => 'required',
            'guest' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'check_in.required' => 'Check-in harus diisi',
            'check_out.required' => 'Check-out harus diisi',
            'guest.required' => 'Jumlah orang harus diisi',
        ];
    }
}