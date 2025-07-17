<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title'          => 'required',
            'content'        => 'required',
            'image'          => 'required',
            'is_active'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'judul blog tidak boleh kosong',
            'content.required'      => 'content blog tidak boleh kosong',
            'image.required'        => 'image blog tidak boleh kosong',
            'is_active.required'    => 'aktivasi blog tidak boleh kosong',
        ];
    }
}
