<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'room_id'      => 'required',
            'check_in'     => 'required',
            'check_out'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'room_id.required'     => 'kamar tidak boleh kosong',
            'check_in.required'    => 'check in tidak boleh kosong',
            'check_out.required'   => 'check out tidak boleh kosong',
        ];
    }
}
